<?php
	echo $this->Html->image(substr($user->dir, 8) . '/' . $user->file, ['fullBase' => true, 'style' => 'width: 70%;']);
    // echo  "<span>".$user->name.": </span><img src='".$this->Url->build(substr($user->dir, 8) . '/' . $user->file, true)."' style='width: 30%;' alt=''>";
?>