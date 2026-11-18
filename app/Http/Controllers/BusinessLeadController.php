<?php

namespace App\Http\Controllers;

use App\Models\BusinessLead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
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
        $validated = $request->validate([
            // مرحله اول: تنها فیلدهای اجباری فرم
            'first_name' => ['required', 'string', 'max:191'],
            'last_name' => ['required', 'string', 'max:191'],
            'phone' => ['required', 'string', 'max:30'],
            'job_title' => ['required', 'string', 'max:191'],
            'birth_date' => ['nullable', 'date'],
            // مرحله دوم: اطلاعات کسب‌وکار
            'business_age' => ['nullable', 'string', 'max:191'],
            'has_store' => ['nullable', 'boolean'],
            'store_address' => ['nullable', 'string', 'max:1000'],
            'has_website' => ['nullable', 'boolean'],
            'website_url' => ['nullable', 'string', 'max:2048'],
            'website_age' => ['nullable', 'string', 'max:191'],
            // مرحله سوم: شبکه‌های اجتماعی
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
            // مرحله چهارم: فروشندگان و ادمین
            'has_sellers' => ['nullable', 'boolean'],
            'has_admin' => ['nullable', 'boolean'],
            'sellers' => ['nullable', 'array'],
            'sellers.*.first_name' => ['nullable', 'string', 'max:191'],
            'sellers.*.last_name' => ['nullable', 'string', 'max:191'],
            'sellers.*.phone' => ['nullable', 'string', 'max:30'],
            'sellers.*.birth_date' => ['nullable', 'date'],
            // مرحله پنجم: اطلاعات مشتریان
            'stores_customer_data' => ['nullable', 'boolean'],
            'repeat_purchase_unknown' => ['nullable', 'boolean'],
            'repeat_purchase_percent' => [
                'nullable',
                'integer',
                'between:0,100',
            ],
            // مرحله ششم: چالش‌ها
            'digital_obstacles' => ['nullable', 'string', 'max:5000'],
            'time_constraints' => ['nullable', 'string', 'max:5000'],
            'sales_problems' => ['nullable', 'array'],
            'sales_problems.*' => ['nullable', 'string', 'max:1000'],
            // مرحله هفتم: ارزش پیشنهادی و همکاری
            'value_propositions' => ['nullable', 'array'],
            'value_propositions.*' => ['nullable', 'string', 'max:191'],
            'cooperations' => ['nullable', 'array'],
            'cooperations.*' => ['nullable', 'string', 'max:191'],
            // مرحله هشتم: معرفی‌شدگان
            'referrals' => ['nullable', 'array'],
            'referrals.*.name' => ['nullable', 'string', 'max:191'],
        ], [
            'first_name.required' => 'لطفاً نام خود را وارد کنید.',
            'last_name.required' => 'لطفاً نام خانوادگی خود را وارد کنید.',
            'phone.required' => 'لطفاً شماره تماس خود را وارد کنید.',
            'job_title.required' => 'لطفاً عنوان شغلی خود را وارد کنید.',
            'birth_date.date' => 'تاریخ تولد واردشده معتبر نیست.',
        ]);

        try {
            DB::transaction(function () use ($validated) {
                $lead = BusinessLead::create([
                    // مرحله اول
                    'first_name' => $validated['first_name'],
                    'last_name' => $validated['last_name'],
                    'phone' => $validated['phone'],
                    'birth_date' => $validated['birth_date'] ?? null,
                    'job_title' => $validated['job_title'],
                    // مرحله دوم
                    'business_age' => $validated['business_age'] ?? null,
                    'has_store' => $validated['has_store'] ?? null,
                    'store_address' => $validated['store_address'] ?? null,
                    'has_website' => $validated['has_website'] ?? null,
                    'website_url' => $validated['website_url'] ?? null,
                    'website_age' => $validated['website_age'] ?? null,
                    // مرحله چهارم
                    'has_sellers' => $validated['has_sellers'] ?? null,
                    'has_admin' => $validated['has_admin'] ?? null,
                    // مرحله پنجم
                    'stores_customer_data' => $validated['stores_customer_data'] ?? null,
                    'repeat_purchase_unknown' => $validated['repeat_purchase_unknown'] ?? null,
                    'repeat_purchase_percent' => $validated['repeat_purchase_percent'] ?? null,
                    // مرحله ششم
                    'digital_obstacles' => $validated['digital_obstacles'] ?? null,
                    'time_constraints' => $validated['time_constraints'] ?? null,
                    'status' => 'new',
                ]);

                // شبکه‌های اجتماعی
                $socials = collect($validated['socials'] ?? [])
                    ->filter(function ($item) {
                        return !empty($item['address']);
                    })
                    ->map(function ($item) {
                        return [
                            'platform' => $item['platform'] ?? null,
                            'address' => trim($item['address']),
                        ];
                    })
                    ->values()
                    ->all();

                if (!empty($socials)) {
                    $lead->socials()->createMany($socials);
                }

                // فروشندگان؛ فقط اگر اطلاعاتی وارد شده باشد
                $sellers = collect($validated['sellers'] ?? [])
                    ->filter(function ($item) {
                        return collect($item)->contains(
                            fn($value) => filled($value)
                        );
                    })
                    ->map(function ($item) {
                        return [
                            'first_name' => $item['first_name'] ?? null,
                            'last_name' => $item['last_name'] ?? null,
                            'phone' => $item['phone'] ?? null,
                            'birth_date' => $item['birth_date'] ?? null,
                        ];
                    })
                    ->values()
                    ->all();

                if (!empty($sellers)) {
                    $lead->sellers()->createMany($sellers);
                }

                // مشکلات فروش
                $problems = collect($validated['sales_problems'] ?? [])
                    ->filter(fn($item) => filled($item))
                    ->map(fn($item) => [
                        'description' => trim($item),
                    ])
                    ->values()
                    ->all();

                if (!empty($problems)) {
                    $lead->salesProblems()->createMany($problems);
                }

                // ارزش‌های پیشنهادی
                $values = collect($validated['value_propositions'] ?? [])
                    ->filter(fn($item) => filled($item))
                    ->map(fn($item) => [
                        'title' => trim($item),
                    ])
                    ->values()
                    ->all();

                if (!empty($values)) {
                    $lead->valuePropositions()->createMany($values);
                }

                // زمینه‌های همکاری
                $cooperations = collect($validated['cooperations'] ?? [])
                    ->filter(fn($item) => filled($item))
                    ->map(fn($item) => [
                        'title' => trim($item),
                    ])
                    ->values()
                    ->all();

                if (!empty($cooperations)) {
                    $lead->cooperations()->createMany($cooperations);
                }

                // افراد معرفی‌شده
                $referrals = collect($validated['referrals'] ?? [])
                    ->filter(fn($item) => filled($item['name'] ?? null))
                    ->map(fn($item) => [
                        'name' => trim($item['name']),
                    ])
                    ->values()
                    ->all();

                if (!empty($referrals)) {
                    $lead->referrals()->createMany($referrals);
                }
            });

            return redirect()
                ->back()
                ->with('success', 'اطلاعات شما با موفقیت ثبت شد.');
        } catch (Throwable $e) {
            Log::error('Business lead registration failed', [
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
            ]);

            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'در ثبت اطلاعات مشکلی پیش آمد. لطفاً دوباره تلاش کنید.');
        }
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
            $lead->birthDate = $lead->birth_date;
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

        $businessLead->birthDate = $businessLead->birth_date;

        $date = implode('/', explode('-', explode(' ', verta($businessLead->created_at))[0]));
        $businessLead->date = $date;

        $update = implode('/', explode('-', explode(' ', verta($businessLead->updated_at))[0])) . ' - ' . explode(' ', $businessLead->updated_at)[1];
        $businessLead->update = $update;

        return view('admin.crm.single', [
            'lead' => $businessLead,
        ]);
    }
}
