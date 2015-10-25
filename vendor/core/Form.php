<?php


class Form
{

    public $errors = array();//

/// verification function

    public function NotEmpty($value){
        global $errors;
        foreach($value as $key => $val){
            if(empty($val)){
                $errors[] = $key;
            }
        }
        return $errors;
    }

    public function Text($value){
        global $errors;
        foreach($value as $key => $val){
            if(is_numeric($val)OR(empty($val))){
                $errors[] = $key;
            }
        }
        return $errors;
    }
    public function Like($value){
        global $errors;
        foreach($value as $key => $val){
            if($val != $_POST[$key]){
                $errors[] = $key;
            }
        }
        return $errors;
    }


#############################################################

    ///// static element in form
    ###### <input type=text>
    static function InputTxt($name,$option=null,$save=null){
        $class = '';
        $divclass = '';
        $label = translater($name);
        $id = 'input'.$name;
        $placeholder = translater($name);
        $inputValue = "";
        if(!empty($option)){
            foreach($option as $key => $value){
                if($key == "class"){
                    $class = $value;
                }
                if($key == "div.class"){
                    $divclass = $value;
                }
                if($key == "label"){
                    $label = $value;
                }
                if($key == "id"){
                    $id = $value;
                }
                if($key == "placeholder"){
                    $placeholder = $value;
                }
                if(!empty($_POST[$name])){
                    $inputValue = 'value="'.$_POST[$name].'"';
                }
                if(!empty($save)){
                    $inputValue = 'value="'.$save.'"';
                }

            }
        }
        $input = '<div class="form-group  '.$divclass.' '.hasErrors($name).'"> ';
        $input .= ($label != 'none')? '<label class="control-label" for="'.$id.'">'.$label.' : </label>':'';
        $input .= '<input type="text" class="form-control '.$class.' " placeholder="'.$placeholder.'" name="'.$name.'" id="'.$id.'" '.$inputValue.'>
                    <span>'.setmsgErrors($name).'</span>
                </div>';
        return $input;
    }
    ###### <input type=email>
    static function InputEmail($name,$option=null,$save=null){
        $class = '';
        $divclass = '';
        $label = translater($name);
        $id = 'email'.$name;
        $placeholder = translater($name);
        $inputValue = "";
        if(!empty($option)){
            foreach($option as $key => $value){
                if($key == "class"){
                    $class = $value;
                }
                if($key == "div.class"){
                    $divclass = $value;
                }
                if($key == "label"){
                    $label = $value;
                }
                if($key == "id"){
                    $id = $value;
                }
                if($key == "placeholder"){
                    $placeholder = $value;
                }
                if(!empty($_POST[$name])){
                    $inputValue = 'value="'.$_POST[$name].'"';
                }
                if(!empty($save)){
                    $inputValue = 'value="'.$save.'"';
                }

            }
        }
        $input = '<div class="form-group  '.$divclass.' '.hasErrors($name).'"> ';
        $input .= ($label != 'none')? '<label class="control-label" for="'.$id.'">'.$label.' : </label>':'';
        $input .= '<input type="email" class="form-control '.$class.' " placeholder="'.$placeholder.'" name="'.$name.'" id="'.$id.'" '.$inputValue.'>
                    <span>'.setmsgErrors($name).'</span>
                </div>';
        return $input;
    }
    ###### <input type=password>
    static function InputPassword($name,$option=null){
        $class = '';
        $divclass = '';
        $label = translater($name);
        $id = 'pass'.$name;
        $placeholder = translater($name);
        if(!empty($option)){
            foreach($option as $key => $value){
                if($key == "class"){
                    $class = $value;
                }
                if($key == "div.class"){
                    $divclass = $value;
                }
                if($key == "label"){
                    $label = $value;
                }
                if($key == "id"){
                    $id = $value;
                }
                if($key == "placeholder"){
                    $placeholder = $value;
                }

            }
        }
        $input = '<div class="form-group  '.$divclass.' '.hasErrors($name).'"> ';
        $input .= ($label != 'none')? '<label class="control-label" for="'.$id.'">'.$label.' : </label>':'';
        $input .= '<input type="password" class="form-control '.$class.' " placeholder="'.$placeholder.'" name="'.$name.'" id="'.$id.'" >
                    <span>'.setmsgErrors($name).'</span>
                </div>';
        return $input;
    }
    ###### <input type=button>
    static function InputBtn($name,$option=null){
        $class = '';
        $divclass = '';
        $label = translater($name);
        $id = 'btn'.$name;
        $placeholder = "___";
        $btnvalue = translater($name);
        if(!empty($option)){
            foreach($option as $key => $value){
                if($key == "class"){
                    $class = $value;
                }
                if($key == "div.class"){
                    $divclass = $value;
                }
                if($key == "label"){
                    $label = 'show';
                }
                if($key == "id"){
                    $id = $value;
                }
                if($key == "value"){
                    $btnvalue = $value;
                }

            }
        }
        $input = '<div class="form-group  '.$divclass.' '.hasErrors($name).'"> ';
        $input .= ($label == 'show')? '<label class="control-label" for="'.$id.'" style="color:transparent!important;">'.$placeholder.' </label>':'';
        $input .= '<input type="button" class="btn '.$class.' " placeholder="'.$placeholder.'" value="'.$btnvalue.'"  name="'.$name.'" id="'.$id.'">
                  </div>';
        return $input;
    }
    ###### <select><option>...
    static function SelectOption($name,$listOption,$option=null,$save=null){
        $class = '';
        $divclass = '';
        $label = translater($name);
        $id = 'select'.$name;
        $selectValue = "";
        if(!empty($option)){
            foreach($option as $key => $value){
                if($key == "class"){
                    $class = $value;
                }
                if($key == "div.class"){
                    $divclass = $value;
                }
                if($key == "label"){
                    $label = 'show';
                }
                if($key == "id"){
                    $id = $value;
                }
                if(!empty($save)){
                    $selectValue = $save;
                }
                if(!empty($_POST[$name])){
                    $selectValue = $_POST[$name];
                }

            }
        }
        $input = '<div class="form-group  '.$divclass.' '.hasErrors($name).'"> ';
        $input .= ($label == 'show')? '<label class="control-label" for="'.$id.'" style="color:transparent!important;">'.$label.' : </label>':'';
        $input .= '<select  class="form-control '.$class.' "  name="'.$name.'" id="'.$id.'">';
        foreach($listOption as $value => $title){
            if($selectValue == $value){
                $input .= '<option value="'.$value.'" selected>'.translater($title).'</option>';
            }else{
                $input .= '<option value="'.$value.'" >'.translater($title).'</option>';
            }
        }
        $input .= '</select></div>';
        return $input;

    }
    ###### <input type=Checkbox>
    static function InbutCheckbox($name,$option=null,$save=null){
        $class = '';
        $divclass = '';
        $checked = '';
        $style_param = '';
        $label = translater($name);
        $id = 'checkbox'.$name;
        if(!empty($option)){
            foreach($option as $key => $value){
                if($key == "class"){
                    $class = $value;
                }
                if($key == "div.class"){
                    $divclass = $value;
                }
                if($key == "label"){
                    $label = $value;
                }
                if($key == "id"){
                    $id = $value;
                }
                if(($key == "checked")OR(!empty($save)&&($save == 1))){
                    $checked = 'checked="checked"';
                }
                if($key == "style"){
                    if($value == 'on/off'){
                        $divclass .= ' make-switch';
                        $style_param = 'data-on="success" data-off="danger"';
                    }
                }

            }
        }
        $input = "";
        $input .= ($label == 'none')? '<label class="control-label" for="'.$id.'" style="color:transparent!important;">'.$label.' : </label>':'';
        $input .= '<div class="form-group  '.$divclass.' '.hasErrors($name).'" '.$style_param.'> ';
        $input .= ($label == 'none')? '':'<label class="control-label" for="'.$id.'" >'.$label.' : </label>';
        $input .= '<input type="checkbox" name="'.$name.'" class="'.$class.'" '.$checked.' />';
        $input .= '</div>';
        return $input;

    }

    ###### <input type=file> /// upload image
    static function InbutUploadPicture($name,$option=null){

        $input = '<div class="col-lg-12 fileupload fileupload-new" data-provides="fileupload" >
                    <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;" >
                        <img src="'.SRC_UPLOAD.'/img/demoUpload.jpg" />
                    </div>
                        <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                        <div>
                            <span class="btn btn-file btn-primary">
                                <span class="fileupload-new">'.translater("selectimg").'</span>
                                <span class="fileupload-exists">'.translater("edit").'</span>
                                <input type="file" name="'.$name.'"/>
                            </span>
                            <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">'.translater("delete").'</a>
                        </div>
                    </div>';
        return $input;

    }

    ###### <input type=date>
    static function InputDate($name,$option=null,$save=null){
        $class = '';
        $divclass = '';
        $label = translater($name);
        $id = 'input'.$name;
        $placeholder = translater($name);
        $inputValue = "";
        if(!empty($option)){
            foreach($option as $key => $value){
                if($key == "class"){
                    $class = $value;
                }
                if($key == "div.class"){
                    $divclass = $value;
                }
                if($key == "label"){
                    $label = $value;
                }
                if($key == "id"){
                    $id = $value;
                }
                if($key == "placeholder"){
                    $placeholder = $value;
                }
                if(!empty($_POST[$name])){
                    $inputValue = 'value="'.$_POST[$name].'"';
                }
                if(!empty($save)){
                    $inputValue = 'value="'.$save.'"';
                }

            }
        }
        $input = '<div class="form-group  '.$divclass.' '.hasErrors($name).'"> ';
        $input .= ($label != 'none')? '<label class="control-label col-lg-12" for="'.$id.'">'.$label.' </label>':'';
        $input .= '<div class="form-group col-lg-12 ">
                    <div class="col-xs-3">
                        <select class="form-control" name="birthday[d]">';
                           for ($i=1; $i < 32; $i++):
        $input .= '<option value="'.$i.'">'.$i.'</option>';
                           endfor;
        $input .= '</select>
                            </div>
                            <div class="col-xs-5">
                                <select class="form-control" name="birthday[m]">';
                                    foreach(translater("moin","time") as $key => $value):
        $input .= '<option value="'.$key.'">'.$value.'</option>';
                                    endforeach;
        $input .= '</select>
                            </div>
                            <div class="col-xs-4">
                                <select class="form-control" name="birthday[y]">';
                                    for ($i=1955; $i < date('Y'); $i++):
        $input .= '<option value="'.$i.'">'.$i.'</option>';
                                    endfor;
        $input .= '</select>
                            </div>
                            </div>';
        $input .= '<span class=" col-lg-12">'.setmsgErrors($name).'</span></div>';
        return $input;
    }

}


/// function

function hasErrors($name=null){
    $data = '';
    if(!empty($_SESSION['Errors'])&&!empty($name)){
        foreach ($_SESSION['Errors'] as $key => $list){
            if(!empty($list)&&(in_array($name,$list))){
                $data = 'has-error';
            }
        }

    }
    return $data;
}
function setmsgErrors($name=null){
    $categMsg = '';
    if(!empty($_SESSION['Errors'])&&!empty($name)){
        foreach ($_SESSION['Errors'] as $key => $list){
            if(!empty($list)&&(in_array($name,$list))){
                $categMsg = $key;
            }
        }
    }
    return (!empty(translater($categMsg,'inputMsgErrors')))? "<h6 class='text-danger'>".translater($categMsg,'inputMsgErrors')."</h6>" :"";
}

////