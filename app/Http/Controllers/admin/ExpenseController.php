<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ExpenseCategory;
use Brian2694\Toastr\Facades\Toastr;
use App\Expense;
use DB;
use Auth;
use App\Store;
use App\Payment;

class ExpenseController extends Controller
{
    public function expenseList()
    {   
        $stores=Store::all();
        $expenseCats=ExpenseCategory::all();
        $expenses=Expense::all();
        return view('admin.modules.expense.expenseList')->with([
            'expenses'=>$expenses,
            'expenseCats'=>$expenseCats,
            'stores'=>$stores,
        ]);
    }

    public function expenseAdd()
    {
        $expenseCats=ExpenseCategory::all();
        $stores=Store::all();
        $expenseLists=ExpenseCategory::all();
        return view('admin.modules.expense.expenseAdd')->with([
          'expenseLists'=>$expenseLists,
          'stores'=>$stores,
          'expenseCats'=>$expenseCats,
      ]);
    }

    public function expenseSave(Request $request)
    {
        $request->validate([
            'eDate'=>'required',
            'cost'=>'required',

        ]);
        if($request->hasFile('documents'))
        {
          $image_name = $request->file('documents');
          $random_name = $image_name->getClientOriginalName();

          $directory = 'public/uploads/expense_document';
          $dbfile = $directory.$random_name;
          $image_name->move($directory, $dbfile);
          $documents= $dbfile;

      }else{
          $documents=null;
      }
      $expense=new Expense;
      $expenses=Expense::all();
       $expenses=count($expenses)+1;
       $code="EX-".$expenses;
      $expense->eDate=$request->eDate;
      $expense->store_id=$request->store_id;
      $expense->reference=$request->reference;
      $expense->category=$request->category;
      $expense->note=$request->note;
      $expense->code=$code;
      $expense->cost=$request->cost;
      $expense->document=$documents;
      $expense->added_by=Auth::user()->id;

      $pay=Payment::all();
      $pay=count($pay)+1;
      $paycode='PAY-'.date('Y-m-d').'/'.$pay;
       
       $payment=New Payment;
       $payment->reference=$paycode;
       $payment->purchasereference=$code;
       $payment->type='paid';
       $payment->amount=$request->cost;
       $payment->paidBy='cash';
       $payment->pDate=$request->eDate;
       $payment->transectionBy=Auth::user()->id;
      try{
        $expense->save();
        $payment->save();
        Toastr::success('Expense Added Successfully.');
        return redirect()->route('admin.expenseList');
    }catch(\Exception $e){
        session()->flash('error-message',$e->getMessage());
        return redirect()->back();

    }
}
public function expensecategory()
{  
    $ExpenseCode=DB::table('systems')->where('id','1')->value('expenseCategoryUnit');
    $expenseCategory=ExpenseCategory::paginate(5);
    return view('admin.modules.setting.expense.expensecategory')->with(['expenseCategory'=>$expenseCategory,'ExpenseCode'=>$ExpenseCode]);
}

public function expenseCategorySave(Request $request)
{
    $request->validate([
        'name'=>'required',
    ]);

    $exCat=new ExpenseCategory;
    $exCat->name=$request->name;
    $exCat->code=$request->code;
    $exCat->description=$request->description;

    try{
        $exCat->save();
        Toastr::success('Expense Category Added Successfully.');
        return redirect()->route('admin.expensecategory');
    }catch(\Exception $e){
        session()->flash('error-message',$e->getMessage());
        return redirect()->back();

    }
}
//edit expense category
public function editExCat(Request $request)
{
  $cat=DB::table('expense_categories')->where('id',$request->id)->first();
  return view('admin.modules.setting.expense.editExpenseCat')->with(['cat'=>$cat]);

}
//update expense category
public function updateExCategory(Request $request)
{
   try{
    DB::table('expense_categories')->where('id',$request->id)->update([
      'name'=>$request->name,
      'description'=>$request->description,
    ]);
    Toastr::success('Category Updated');
    return redirect()->route('admin.expensecategory');
  }catch(\Exception $e)
  {
    session()->flash('error-message',$e->getMessage());
        return redirect()->back();
  }
}
//delete expense category
public function deleteExCat(Request $request)
{
  try{
    DB::table('expense_categories')->where('id',$request->id)->delete();
    Toastr::success('Category Deleted');
    return redirect()->route('admin.expensecategory');
  }catch(\Exception $e)
  {
    session()->flash('error-message',$e->getMessage());
        return redirect()->back();
  }
}
//edit expense
public function editExpense(Request $request)
{
  $expense=Expense::where('id',$request->id)->first();
  return view('admin.modules.expense.editExpense')->with(['expense'=>$expense]);
}
//update expense 
public function updateExpense(Request $request)
{
  $request->validate([
   'id'=>'required|numeric',
   'cost'=>'required|numeric',
  ]);
  try{
 DB::table('expenses')->where('id',$request->id)->update([
  'reference'=>$request->reference,
  'category'=>$request->category,
  'eDate'=>$request->eDate,
  'cost'=>$request->cost,
  'note'=>$request->note,
 ]);
 Toastr::success('Expense updated');
 return redirect()->route('admin.expenseList');
}catch(\Exception $e)
{
  session()->flash('error-message',$e->getMessage());
  return redirect()->back();
}
}
//delete expense
public function expenseDelete(Request $request)
{
  $request->validate([
    'id'=>'required|numeric',
  ]);
  try{
    DB::table('expenses')->where('id',$request->id)->delete();
    Toastr::success('Expense Deleted');
    return redirect()->route('admin.expenseList');
  }catch(\Exception $e)
  {
    session()->flash('message',$e->getMessage());
    return redirect()->back();
  }
}
}
