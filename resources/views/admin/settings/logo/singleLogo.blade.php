 @if($logo->meta_key == "logo")
        <img src="<?= asset("storage/" . $logo->meta_value) ?>">
 @endif