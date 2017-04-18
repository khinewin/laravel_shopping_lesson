<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cat;
use App\Coffee;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class CoffeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function postDeleteCoffee(Request $request){
        $ids=$request['delCoffee'];
        if($ids){

                DB::table('coffees')->whereIn('id', $ids)->delete();

                return redirect()->back();

        }else{
            return redirect()->back();
        }
    }
    public function postNewCoffee(Request $request){
        $this->validate($request,[
           'photo'=>'required',
            'coffee_name'=>'required',
            'cat_id'=>'different:0',
            'price'=>'required'
        ]);
       $file= $request->file('photo');


        $cf=new Coffee();
        $cf->coffee_name=$request['coffee_name'];
        $cf->price=$request['price'];
        $cf->cat_id=$request['category'];
        $cf->photo=$request->file('photo')->getClientOriginalName();
        $result=$cf->save();
        if($result){
            Storage::disk('local')->put($file->getClientOriginalName(), File::get($file));
        }
        return redirect()->back();



    }
    public function showCoffeePhoto($fileName){
        $file=Storage::disk('local')->get($fileName);
        return new Response($file, 200);
    }

    public function getCoffeeCategories(){
        return view ('coffee.coffee_cat');
    }
    public function postNewCategory(Request $request){
        $cat_name=$request['cat_name'];
        if($cat_name){
            $cat=new Cat();
            $cat->cat_name=$cat_name;
            $cat->save();
            echo "<li class='alert alert-success'><span class='glyphicon glyphicon-ok-circle'></span> The category have been adding successfully.</li>";

        }else{
            echo "<li class='alert alert-danger'><span class='glyphicon glyphicon-alert'></span> The category name field is required.</li>";
        }
    }
    public function showCategory(){
        $cat=Cat::OrderBy ('id', 'desc')->get();

        foreach ($cat as $row){
            ?>
            <tr class="alert-warning">
                <td><?php echo $row->id ?></td>
                <td><?php echo $row->cat_name ?></td>
                <td><a href="#" id="delCat" idd="<?php echo $row->id ?>">Delete</a></td>

            </tr>

            <?php
        }
    }

    public function getCoffee(){
        $cfs=Coffee::OrderBy('id', 'desc')->paginate('3');
        $cats=Cat::all();
            return view ('coffee.showCoffee')->with(['cats'=>$cats])->with(['cfs'=>$cfs]);
        }


    public function getDelCat(Request $request){
        $id=$request['id'];
        $cat=Cat::where('id', $id);
        $cat->delete();
        echo "delCatSuccess";
    }
}
