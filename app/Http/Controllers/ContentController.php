<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Content;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ContentsImport;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Illuminate\Support\Facades\File;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $contents = Content::where('head_content',$request->head_content)->get();

        return response()->json($contents);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $content = Content::create($request->all());
        return response()->json($content, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $content = Content::find($id);
        if (is_null($content)) {
            return response()->json(['message' => 'Content not found'], 404);
        }
        return response()->json($content);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $content = Content::find($id);
        if (is_null($content)) {
            return response()->json(['message' => 'Content not found'], 404);
        }
        $content->update($request->all());
        return response()->json($content);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $content = Content::find($id);
        if (is_null($content)) {
            return response()->json(['message' => 'Content not found'], 404);
        }
        $content->delete();
        return response()->json(null, 204);
    }

    /**
     * Import data from an Excel file.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request)
    {
        // Kiểm tra xem file có được upload không
        if ($request->hasFile('files')) {
            $file = $request->file('files');

            // Đọc file Excel
            $spreadsheet = IOFactory::load($file->getRealPath());

            // Lấy sheet đầu tiên
            $sheet = $spreadsheet->getActiveSheet();

            // Bỏ qua dòng tiêu đề (nếu có)
            $rows = $sheet->toArray();
            array_shift($rows); // Bỏ qua dòng đầu tiên (tiêu đề)

            // Lặp qua các dòng trong sheet
            foreach ($rows as $row) {
                // Tạo một bản ghi mới trong model Question
                Content::create([
                    'title' => $row[0], // Thay 'column1' bằng tên cột trong bảng của bạn
                    'viet' => $row[3],
                    'nga' => $row[1], // Thay 'column2' bằng tên cột trong bảng của bạn
                    'phienam' => $row[2],
                    'category_id' => $row[4]
                ]);
            }

            return response()->json(['success' => 'Import thành công!'], 200);
        }

        return response()->json(['error' => 'Vui lòng chọn file để import.'], 400);
    }
}
