<?php

namespace App\Http\Controllers;

use App\Models\pages;
use App\Models\FAQ;
use App\Models\page_blocks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FAQController extends Controller
{
    public function create(pages $pages)
    {
        return view('admin.faq.create', ['pages' => $pages]);
    }
    public function store(Request $request)
    {
        $page_block_id = page_blocks::insertGetId([
            'title' => $request->title,
            'page_id' => $request->page_id,
            'type'=>'FAQS'
        ]);

        $blockTitle = page_blocks::find($page_block_id);
        if ($request->datas) {
            $createdFaqs = [];
            foreach ($request->datas as $faqData) {
                $faq = FAQ::create([
                    'question' => $faqData[0],
                    'answer' => $faqData[1],
                    'page_id' => $request->page_id,
                    'block_id' => $page_block_id
                ]);
                $createdFaqs[] = $faq;
            }
            return response()->json([
                'faqs' => $createdFaqs,
                'block' => $blockTitle
            ]);
        }

        $faq = FAQ::create([
            'question' => $request->question,
            'answer' => $request->answer,
            'page_id' => $request->page_id,
            'block_id' => $page_block_id
        ]);
        return response()->json([
            'faq' => $faq,
            'block' => $blockTitle
        ]);
    }
    public function edit(Request $request)
    {
        $id = $request->input('id');
        $faq = FAQ::find($id);
        return response()->json($faq);
    }

    public function update(Request $request)
    {
        $faq = FAQ::find($request->id);
        $faq->question = $request->question;
        $faq->answer = $request->answer;
        $faq->save();
        return response()->json($faq);
    }

    public function delete(Request $request)
    {
        $id = $request->input('id');
        $faq = FAQ::find($id);
        $blockId = $faq->block_id;
        $remainingFaqs = FAQ::where('block_id', $blockId)->count();
        if ($remainingFaqs == 0) {
            page_blocks::where('id', $blockId)
                ->where('type', 'FAQS')
                ->delete();
        }
        $faq->delete();
        return response()->json('ok');
    }
    
    public function addQuestion(Request $request)
    {
        $faq = FAQ::create([
            'question' => $request->question,
            'answer' => $request->answer,
            'page_id' => $request->page_id,
            'block_id' => $request->block_id
        ]);

        return response()->json($faq);
    }
}

