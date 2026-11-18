<?php

namespace App\Http\Controllers;

use App\Models\BusinessLead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use Illuminate\Validation\Rule;
use Throwable;

class BusinessLeadController extends Controller
{
    public function create($team)
    {
        return view('client.crm.form', ['team' => $team]);
    }

    public function store(Request $request)
    {
        $request->merge([
            'has_store' => $request->boolean('has_store'),
            'has_website' => $request->boolean('has_website'),
            'stores_customer_data' => $request->boolean('stores_customer_data'),
            'repeat_purchase_unknown' => $request->boolean('repeat_purchase_unknown'),
        ]);

        $validated = $request->validate([
            // اطلاعات فردی
            'team' => ['nullable', 'string', 'max:191'],
            'first_name' => ['nullable', 'string', 'max:191'],
            'last_name' => ['nullable', 'string', 'max:191'],
            'phone' => ['nullable', 'string', 'max:20'],
            'birth_date' => ['nullable', 'date'],
            'job_title' => ['nullable', 'string', 'max:191'],
            // اطلاعات کسب‌وکار
            'business_age' => ['nullable', 'string', 'max:191'],
            'has_store' => ['nullable', 'boolean'],
            'store_address' => ['nullable', 'string'],
            'has_website' => ['nullable', 'boolean'],
            'website_url' => ['nullable', 'string', 'max:2048'],
            'website_age' => ['nullable', 'string', 'max:191'],
            // اطلاعات مشتریان
            'stores_customer_data' => ['nullable', 'boolean'],
            'repeat_purchase_unknown' => ['nullable', 'boolean'],
            'repeat_purchase_percent' => ['nullable', 'integer', 'between:0,100'],
            // چالش‌های کسب‌وکار
            'digital_obstacles' => ['nullable', 'string'],
            'time_constraints' => ['nullable', 'string'],
            // شبکه‌های اجتماعی
            'socials' => ['nullable', 'array'],
            'socials.*.platform' => [
                'nullable',
                'string',
                Rule::in([
                    'telegram',
                    'instagram',
                    'eitaa',
                    'rubika',
                    'bale',
                    'linkedin',
                ]),
            ],
            'socials.*.address' => ['nullable', 'string', 'max:2048'],
            // فروشندگان
            'sellers' => ['nullable', 'array'],
            'sellers.*.first_name' => ['nullable', 'string', 'max:191'],
            'sellers.*.last_name' => ['nullable', 'string', 'max:191'],
            'sellers.*.phone' => ['nullable', 'string', 'max:20'],
            'sellers.*.birth_date' => ['nullable', 'date'],
            // ارزش‌های پیشنهادی
            'value_propositions' => ['nullable', 'array', 'max:3'],
            'value_propositions.*' => ['nullable', 'string', 'max:191'],
            // مشکلات فروش
            'sales_problems' => ['nullable', 'array', 'max:5'],
            'sales_problems.*' => ['nullable', 'string'],
            // زمینه‌های همکاری
            'cooperations' => ['nullable', 'array'],
            'cooperations.*' => ['nullable', 'string', 'max:191'],
        ], [
            'string' => 'فرمت فیلد :attribute صحیح نیست.',
            'max' => 'تعداد کاراکترهای فیلد :attribute بیش از حد مجاز است.',
            'integer' => 'فیلد :attribute باید عدد صحیح باشد.',
            'between' => 'مقدار فیلد :attribute باید بین :min تا :max باشد.',
            'boolean' => 'مقدار فیلد :attribute معتبر نیست.',
            'date' => 'تاریخ واردشده برای فیلد :attribute معتبر نیست.',
            'array' => 'ساختار اطلاعات فیلد :attribute معتبر نیست.',
            'socials.*.platform.in' => 'شبکه اجتماعی انتخاب‌شده معتبر نیست.',
            'value_propositions.max' => 'حداکثر سه ارزش پیشنهادی می‌توانید وارد کنید.',
            'sales_problems.max' => 'حداکثر پنج مشکل فروش می‌توانید وارد کنید.',
        ], [
            'team' => 'تیم',
            'first_name' => 'نام',
            'last_name' => 'نام خانوادگی',
            'phone' => 'شماره تلفن',
            'birth_date' => 'تاریخ تولد',
            'job_title' => 'عنوان شغلی',
            'business_age' => 'سابقه فعالیت',
            'store_address' => 'آدرس فروشگاه',
            'website_url' => 'آدرس وب‌سایت',
            'website_age' => 'مدت فعالیت وب‌سایت',
            'repeat_purchase_percent' => 'درصد خرید تکراری',
            'digital_obstacles' => 'موانع دیجیتال',
            'time_constraints' => 'محدودیت زمانی',
            'socials' => 'شبکه‌های اجتماعی',
            'sellers' => 'فروشندگان',
            'value_propositions' => 'ارزش‌های پیشنهادی',
            'sales_problems' => 'مشکلات فروش',
            'cooperations' => 'زمینه‌های همکاری',
        ]);

        try {
            DB::transaction(function () use ($validated) {
                /*
                 * |--------------------------------------------------------------------------
                 * | اطلاعات اصلی کسب‌وکار
                 * |--------------------------------------------------------------------------
                 */

                $leadData = Arr::only($validated, [
                    'team',
                    'first_name',
                    'last_name',
                    'phone',
                    'birth_date',
                    'job_title',
                    'business_age',
                    'has_store',
                    'store_address',
                    'has_website',
                    'website_url',
                    'website_age',
                    'stores_customer_data',
                    'repeat_purchase_percent',
                    'repeat_purchase_unknown',
                    'digital_obstacles',
                    'time_constraints',
                ]);

                $lead = BusinessLead::create($leadData);

                /*
                 * |--------------------------------------------------------------------------
                 * | شبکه‌های اجتماعی
                 * |--------------------------------------------------------------------------
                 */

                $socials = collect($validated['socials'] ?? [])
                    ->filter(fn($item) =>
                        filled($item['address'] ?? null) &&
                        filled($item['platform'] ?? null))
                    ->map(fn($item) => [
                        'platform' => $item['platform'],
                        'address' => $item['address'],
                    ])
                    ->values()
                    ->all();

                if ($socials) {
                    $lead->socials()->createMany($socials);
                }

                /*
                 * |--------------------------------------------------------------------------
                 * | فروشندگان
                 * |--------------------------------------------------------------------------
                 */

                $sellers = collect($validated['sellers'] ?? [])
                    ->filter(fn($item) =>
                        filled($item['first_name'] ?? null) ||
                        filled($item['last_name'] ?? null) ||
                        filled($item['phone'] ?? null) ||
                        filled($item['birth_date'] ?? null))
                    ->map(fn($item) => [
                        'first_name' => $item['first_name'] ?? null,
                        'last_name' => $item['last_name'] ?? null,
                        'phone' => $item['phone'] ?? null,
                        'birth_date' => $item['birth_date'] ?? null,
                    ])
                    ->values()
                    ->all();

                if ($sellers) {
                    $lead->sellers()->createMany($sellers);
                }

                /*
                 * |--------------------------------------------------------------------------
                 * | ارزش‌های پیشنهادی
                 * |--------------------------------------------------------------------------
                 */

                $values = collect($validated['value_propositions'] ?? [])
                    ->filter(fn($item) => filled($item))
                    ->map(fn($item) => [
                        'title' => $item,
                    ])
                    ->values()
                    ->all();

                if ($values) {
                    $lead->valuePropositions()->createMany($values);
                }

                /*
                 * |--------------------------------------------------------------------------
                 * | مشکلات فروش
                 * |--------------------------------------------------------------------------
                 */

                $problems = collect($validated['sales_problems'] ?? [])
                    ->filter(fn($item) => filled($item))
                    ->map(fn($item) => [
                        'description' => $item,
                    ])
                    ->values()
                    ->all();

                if ($problems) {
                    $lead->salesProblems()->createMany($problems);
                }

                /*
                 * |--------------------------------------------------------------------------
                 * | زمینه‌های همکاری
                 * |--------------------------------------------------------------------------
                 */

                $cooperations = collect($validated['cooperations'] ?? [])
                    ->filter(fn($item) => filled($item))
                    ->map(fn($item) => [
                        'title' => $item,
                    ])
                    ->values()
                    ->all();

                if ($cooperations) {
                    $lead->cooperations()->createMany($cooperations);
                }
            });

            return redirect()
                ->back()
                ->with('success', 'اطلاعات کسب‌وکار با موفقیت ثبت شد.');
        } catch (Throwable $e) {
            report($e);

            return redirect()
               ->back()
               ->withInput()
               ->with('error', 'متأسفانه هنگام ثبت اطلاعات مشکلی رخ داد. لطفاً مجدداً تلاش کنید.');
        }
        // catch (Throwable $e) {

        //     dd([
        //         'message' => $e->getMessage(),
        //         'file' => $e->getFile(),
        //         'line' => $e->getLine(),
        //         'code' => $e->getCode(),
        //     ]);

        //     report($e);

        //     return redirect()
        //         ->back()
        //         ->withInput()
        //         ->with('error', 'مشکلی هنگام ثبت اطلاعات رخ داد.');
        // }
    }

    public function index(Request $request)
    {
        $query = BusinessLead::query();

        // جست‌وجو
        if ($request->filled('search')) {
            $search = trim($request->search);

            $query->where(function ($q) use ($search) {
                $q
                    ->where('first_name', 'like', "%{$search}%")
                    ->orWhere('last_name', 'like', "%{$search}%")
                    ->orWhere('phone', 'like', "%{$search}%")
                    ->orWhere('job_title', 'like', "%{$search}%");
            });
        }

        // فیلتر وضعیت
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // تعداد کل رکوردها
        $totalLeads = BusinessLead::count();

        // دریافت اطلاعات همراه با صفحه‌بندی
        $leads = $query
            ->latest()
            ->paginate(15)
            ->withQueryString();

        foreach ($leads as $lead) {
            $birthDate = implode('/', explode('-', explode(' ', verta($lead->birth_date))[0]));
            $lead->birthDate = $birthDate;

            $date = implode('/', explode('-', explode(' ', verta($lead->created_at))[0]));
            $lead->date = $date;
        }

        return view('admin.crm.index', compact(
            'leads',
            'totalLeads'
        ));
    }

    public function show(BusinessLead $businessLead)
    {
        $businessLead->load([
            'socials',
            'sellers',
            'valuePropositions',
            'salesProblems',
            'cooperations',
        ]);
    
        $birthDate = implode('/', explode('-', explode(' ', verta($businessLead->birth_date))[0]));
        $businessLead->birthDate = $birthDate;

        $date = implode('/', explode('-', explode(' ', verta($businessLead->created_at))[0]));
        $businessLead->date = $date;

        $update = implode('/', explode('-', explode(' ', verta($businessLead->updated_at))[0]))." - ".explode(' ', $businessLead->updated_at)[1];
        $businessLead->update = $update;


        return view('admin.crm.single', [
            'lead' => $businessLead,
        ]);
    }
}
