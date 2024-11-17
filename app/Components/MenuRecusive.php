<?php 
namespace App\Components;
use App\Models\Menu;

class MenuRecusive{
    private $html;
    public function __construct(){
        $this->html='';
    }
    public function menuRecusiveAdd($parentId=0,$subMark=''){
        $data=Menu::where('parent_id',$parentId)->get();
        foreach($data as $dataItem){
            $this->html .= '<option value="'.$dataItem->id.'">'
            .$subMark.$dataItem->name.'</option>';
            $this->menuRecusiveAdd($dataItem->id,$subMark. '--');
        }
        return $this->html;
        
    }
    public function menuRecusiveEdit($parentIdMenuEdit,$parentId=0,$subMark=''){
        $data=Menu::where('parent_id',$parentId)->get();
        foreach($data as $dataItem){
            if($parentIdMenuEdit == $dataItem->id){
                $this->html .= '<option selected value="'.$dataItem->id.'">'
                .$subMark.$dataItem->name.'</option>';
            }else{
                $this->html .= '<option value="'.$dataItem->id.'">'
                .$subMark.$dataItem->name.'</option>';
            }
            $this->menuRecusiveEdit($parentIdMenuEdit,$dataItem->id,$subMark. '--');
        }
        return $this->html;      
    }
    //giải thích cách chạy
    /**
     * b1: lấy tất cả menu có parent_id=0; --menu 1, menu 2, menu3
     * //sau khi lấy đc dl => foreach
     * // lần lặp đầu tiên sẽ in ra menu 1 -> lấy $dataItem
     * // data sẽ là menu 1.1 và menu 1.2
     */
    

}