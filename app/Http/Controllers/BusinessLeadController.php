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

            /*
            |--------------------------------------------------------------------------
            | Step 1 - Personal Information
            |--------------------------------------------------------------------------
            */

            'team' => ['nullable', 'string', 'max:191'],

            'first_name' => ['required', 'string', 'max:191'],
            'last_name' => ['required', 'string', 'max:191'],
            'phone' => ['required', 'string', 'max:20'],
            'birth_date' => ['nullable', 'string'],
            'job_title' => ['required', 'string', 'max:191'],


            /*
            |--------------------------------------------------------------------------
            | Step 2 - Business Information
            |--------------------------------------------------------------------------
            */

            'business_age' => ['nullable', 'string', 'max:191'],

            'has_store' => ['nullable', 'boolean'],
            'store_address' => ['nullable', 'string'],

            'has_website' => ['nullable', 'boolean'],
            'website_url' => ['nullable', 'string', 'max:2048'],
            'website_age' => ['nullable', 'string', 'max:191'],


            /*
            |--------------------------------------------------------------------------
            | Step 3 - Social Networks
            |--------------------------------------------------------------------------
            */

            'socials' => ['nullable', 'array'],

            'socials.*.platform' => [
                'nullable',
                'string',
                'in:telegram,instagram,eitaa,rubika,bale,linkedin'
            ],

            'socials.*.address' => ['nullable', 'string', 'max:2048'],


            /*
            |--------------------------------------------------------------------------
            | Step 4 - Business Team
            |--------------------------------------------------------------------------
            */

            'has_sellers' => ['nullable', 'boolean'],
            'has_admin' => ['nullable', 'boolean'],


            /*
            |--------------------------------------------------------------------------
            | Step 5 - Customers
            |--------------------------------------------------------------------------
            */

            'stores_customer_data' => ['nullable', 'boolean'],

            'repeat_purchase_percent' => [
                'nullable',
                'integer',
                'between:0,100'
            ],

            'repeat_purchase_unknown' => ['nullable', 'boolean'],


            /*
            |--------------------------------------------------------------------------
            | Step 6 - Business Challenges
            |--------------------------------------------------------------------------
            */

            'digital_obstacles' => ['nullable', 'string'],
            'time_constraints' => ['nullable', 'string'],

            'sales_problems' => ['nullable', 'array'],
            'sales_problems.*' => ['nullable', 'string', 'max:1000'],


            /*
            |--------------------------------------------------------------------------
            | Step 7 - Value Propositions & Cooperation
            |--------------------------------------------------------------------------
            */

            'value_propositions' => ['nullable', 'array'],
            'value_propositions.*' => ['nullable', 'string', 'max:191'],

            'cooperations' => ['nullable', 'array'],
            'cooperations.*' => ['nullable', 'string', 'max:191'],


            /*
            |--------------------------------------------------------------------------
            | Step 8 - Referrals
            |--------------------------------------------------------------------------
            */

            'referrals' => ['nullable', 'array'],

            'referrals.*.name' => [
                'nullable',
                'string',
                'max:191'
            ],

            'referrals.*.phone' => [
                'nullable',
                'string',
                'max:20'
            ],

        ]);
        DB::transaction(function () use ($validated) {

            /*
            |--------------------------------------------------------------------------
            | Create Main Business Lead
            |--------------------------------------------------------------------------
            */

            $mainFields = [
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

                'has_sellers',
                'has_admin',

                'stores_customer_data',
                'repeat_purchase_percent',
                'repeat_purchase_unknown',

                'digital_obstacles',
                'time_constraints',
            ];

            $leadData = array_intersect_key(
                $validated,
                array_flip($mainFields)
            );

            // اگر کاربر آمار خرید تکراری ندارد، درصد را خالی ذخیره می‌کنیم.
            if (!empty($leadData['repeat_purchase_unknown'])) {
                $leadData['repeat_purchase_percent'] = null;
            }

            $lead = BusinessLead::create($leadData);


            /*
            |--------------------------------------------------------------------------
            | Save Social Networks
            |--------------------------------------------------------------------------
            */

            $socials = collect($validated['socials'] ?? [])
                ->filter(function ($social) {
                    return !empty(trim($social['address'] ?? ''));
                })
                ->map(function ($social) {
                    return [
                        'platform' => $social['platform'],
                        'address' => trim($social['address']),
                    ];
                })
                ->values()
                ->all();

            if (!empty($socials)) {
                $lead->socials()->createMany($socials);
            }


            /*
            |--------------------------------------------------------------------------
            | Save Sales Problems
            |--------------------------------------------------------------------------
            */

            $salesProblems = collect($validated['sales_problems'] ?? [])
                ->filter(function ($item) {
                    return !empty(trim($item ?? ''));
                })
                ->map(function ($item) {
                    return ['description' => trim($item)];
                })
                ->values()
                ->all();

            if (!empty($salesProblems)) {
                $lead->salesProblems()->createMany($salesProblems);
            }


            /*
            |--------------------------------------------------------------------------
            | Save Value Propositions
            |--------------------------------------------------------------------------
            */

            $valuePropositions = collect($validated['value_propositions'] ?? [])
                ->filter(function ($item) {
                    return !empty(trim($item ?? ''));
                })
                ->map(function ($item) {
                    return ['title' => trim($item)];
                })
                ->values()
                ->all();

            if (!empty($valuePropositions)) {
                $lead->valuePropositions()->createMany($valuePropositions);
            }


            /*
            |--------------------------------------------------------------------------
            | Save Cooperations
            |--------------------------------------------------------------------------
            */

            $cooperations = collect($validated['cooperations'] ?? [])
                ->filter(function ($item) {
                    return !empty(trim($item ?? ''));
                })
                ->map(function ($item) {
                    return ['title' => trim($item)];
                })
                ->values()
                ->all();

            if (!empty($cooperations)) {
                $lead->cooperations()->createMany($cooperations);
            }


            /*
            |--------------------------------------------------------------------------
            | Save Referrals
            |--------------------------------------------------------------------------
            */

            $referrals = collect($validated['referrals'] ?? [])
                ->filter(function ($referral) {

                    $name = trim($referral['name'] ?? '');
                    $phone = trim($referral['phone'] ?? '');

                    // اگر هر دو فیلد خالی باشند، این فرد ذخیره نمی‌شود.
                    return $name !== '' || $phone !== '';
                })
                ->map(function ($referral) {

                    return [
                        'name' => trim($referral['name'] ?? ''),
                        'phone' => trim($referral['phone'] ?? ''),
                    ];

                })
                ->values()
                ->all();

            if (!empty($referrals)) {
                $lead->referrals()->createMany($referrals);
            }

        });


        return redirect()
            ->back()
            ->with('success', 'اطلاعات کسب‌وکار شما با موفقیت ثبت شد.');
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
            'referrals',
        ]);

        // $businessLead->birthDate = $businessLead->birth_date;
        $businessLead->birthDate = $businessLead->birth_date
            ? str_replace('-', '/', explode(' ', $businessLead->birth_date)[0])
            : null;

        $date = implode('/', explode('-', explode(' ', verta($businessLead->created_at))[0]));
        $businessLead->date = $date;

        $update = implode('/', explode('-', explode(' ', verta($businessLead->updated_at))[0])) . ' - ' . explode(' ', $businessLead->updated_at)[1];
        $businessLead->update = $update;

        return view('admin.crm.single', [
            'lead' => $businessLead,
        ]);
    }
}
