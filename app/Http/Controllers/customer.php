<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\order;
use App\product;
use App\order_food_list;
use App\Queue;
use Codedge\Fpdf\Fpdf\FPDF;
use App\Http\Controllers\QueController;
use Illuminate\Support\Facades\DB;

class customer extends Controller
{
    public function startorder(Request $request){
        $request->session()->flush();
        return redirect()->route('viewSet');
    }
    public function viewAlacarte(Request $request){
        $product  = product::where('product_category','Alacarte')->orderBy('created_at', 'asc')->get();
        return view('Customer.viewproduct',compact('product'));
    }
    public function viewSet(Request $request){
        $product  = product::where('product_category','Set')->orderBy('created_at', 'asc')->get();
        return view('Customer.viewproduct',compact('product'));
    }
    public function selectitem(Request $request){
    	$id=$request->product_id;
        $name=$request->product_name;
        $price=$request->product_price;
        $quantity=$request->quantity;
        $has=false;
        $foo = $request->session()->get('SelectedProduct');
        for($i=0; $i<count($foo);$i++)
        {
            if($foo[$i]['id']==$id)
            {
                $foo[$i]['quantity']=$foo[$i]['quantity']+$quantity;
                $has=true;
                break;
            }
        }
        if($has)
        {
            $request->session()->forget('SelectedProduct');
            $request->session()->put('SelectedProduct', $foo);
        }
        else if(!$has)
        {
            $selectedproduct = ['id'=>$id, 'product_name'=>$name, 'product_price'=>$price, 'quantity'=>$quantity] ;
            $request->session()->push('SelectedProduct', $selectedproduct);
        }
        return back();
    }
    
    public function proceed(Request $request){
        $SelectedItem = $request->session()->get('SelectedProduct');
        return view('Customer.OrderConfirmation',compact('SelectedItem'));
    }

    public function pay(Request $request, QueController $que){
        $totalPrice=0;
        $queue_number=$que->getQeuNum();
        //$queue_number=100;
        $foo = $request->session()->get('SelectedProduct');
        for($i=0; $i<count($foo); $i++)
        {
            $totalPrice=$totalPrice+($foo[$i]['product_price']*$foo[$i]['quantity']);
        }
        $order = new order;
        $order->total_price = $totalPrice;
        $order->order_status = "Waiting";
        $order->order_date_time = date("Y-m-d H:i:s");
        $order->queue_number=$queue_number;
        $order->save();
        $order2 = order::orderBy('id', 'dsc')->first();
        for($t=0; $t<count($foo); $t++)
        {
            $order_food_list = new order_food_list;
            $order_food_list->order_id=$order2['id'];
            $order_food_list->product_id=$foo[$t]['id'];
            $order_food_list->quantity=$foo[$t]['quantity'];
            $order_food_list->save();
        }
        $SelectedItem = $request->session()->get('SelectedProduct');
        return view('Customer.pay',compact('order2'));
    }

    public function deleteitem(Request $request){
        $id=$request->list_id;
        $foo = $request->session()->get('SelectedProduct');
        unset($foo[$id]);
        $foo2= array_values($foo);
        $request->session()->forget('SelectedProduct');
        $request->session()->put('SelectedProduct', $foo2);
        return  back();
    }
    
    public function PrintReceipt(order $order2){
        //return view('Customer.PrintReceipt',compact('print'));

         $selectedproduct = DB:: table('order_food_lists')
                            ->join('products', 'order_food_lists.product_id', '=', 'products.id')
                            ->where('order_id', $order2->id)
                            ->select('products.product_name as product_name','products.product_price as product_price', 'order_food_lists.quantity as quantity')
                            ->get();
         $total=0;

         $pdf = new Fpdf();
         $pdf->AddPage();
         $pdf->Ln();
         $pdf->Ln();
         $pdf->SetFont('Arial','B',18);
         $pdf->Cell(0,10,"Receipt",0,"","C");
         $pdf->Ln();
         $pdf->Ln();
         $pdf->Ln();
         $pdf->SetFont('Arial','B',12);
         $pdf->Cell(110);
         $pdf->cell(30,8,"Date",1,"","C");
         $pdf->SetFont("Arial","",10);
         $pdf->cell(40,8,date("F j\,  Y"),1,"","R");
         $pdf->Ln();
         $pdf->Cell(110);
         $pdf->SetFont('Arial','B',12);
         $pdf->cell(30,8,"Receipt #",1,"","C");
         $pdf->SetFont("Arial","",10);
         $pdf->cell(40,8,$order2->id,1,"","R");
         $pdf->Ln();
         $pdf->Cell(110);
         $pdf->SetFont('Arial','B',12);
         $pdf->cell(30,8,"Queue #",1,"","C");
         $pdf->SetFont("Arial","",10);
         $pdf->cell(40,8,$order2->queue_number,1,"","R");

         $pdf->Ln();
         $pdf->Ln();
         $pdf->Ln();
         $pdf->SetFont("Arial","B",12);
         $pdf->Cell(10);
         $pdf->cell(70,8,"Item",1,"","L");
         $pdf->cell(35,8,"Unit Price (RM)",1,"","C");
         $pdf->cell(35,8,"Qantity",1,"","C");
         $pdf->cell(35,8,"Price (RM)",1,"","C");
         $pdf->SetFont("Arial","",12);
         for($i=0; $i<count($selectedproduct); $i++)
         {
             $pdf->Ln();
             $pdf->Cell(10);
             $pdf->cell(70,8,$selectedproduct[$i]->product_name,1,"","L");
             $pdf->cell(35,8,$selectedproduct[$i]->product_price,1,"","C");
             $pdf->cell(35,8,$selectedproduct[$i]->quantity,1,"","C");
             $pdf->cell(35,8,$selectedproduct[$i]->quantity*$selectedproduct[$i]->product_price,1,"","C");
             $total=$total+$selectedproduct[$i]->quantity*$selectedproduct[$i]->product_price;
         }
         $pdf->Ln();
         $pdf->SetFont("Arial","B",12);
         $pdf->Cell(10);
         $pdf->cell(140,8,"GRAND TOTAL",1,"","C");
         $pdf->cell(35,8,'RM '. $total ,1,"","C");
         $pdf->Output('D','filename.pdf');
        //return redirect()->route('startorder');
    }
    
    //
}
