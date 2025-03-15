<?php

    use App\Mail\OrderEmail;
    use App\Models\category;
    use App\Models\Country;
    use App\Models\Order;
    use App\Models\OrderItem;
    use App\Models\Page;
    use App\Models\Product;
    use App\Models\ProductImage;
    use Gloudemans\Shoppingcart\Facades\Cart;
    use Illuminate\Support\Facades\Mail;


    function staticPages () {
        $pages = Page::orderBy('name', 'ASC')->get();
        return $pages;
    }
    
?>