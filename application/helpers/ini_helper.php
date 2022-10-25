<?php

function is_active($arr, $butuhnya){

  if(is_array($arr)){
    if(in_array($butuhnya, $arr)){
      echo "active";
    }
  } else {
    if($arr == $butuhnya){
      echo "active";
    }
  }
}