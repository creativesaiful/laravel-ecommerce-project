<div class="sidebar-widget product-tag wow fadeInUp">
    <h3 class="section-title">Product tags</h3>
    <div class="sidebar-widget-body outer-top-xs">
        <div class="tag-list">
            @php
                $pdt_tag_en = App\Models\Product::groupBy('product_tags_en')
                    ->select('product_tags_en')
                    ->get();
                $pdt_tag_hin = App\Models\Product::groupBy('product_tags_hin')
                    ->select('product_tags_hin')
                    ->get();
            @endphp
            @if (session()->get('language') == 'hindi')
                @foreach ($pdt_tag_hin as $tag)
                    <a class="item active"
                        href="{{ route('tag.product', str_replace(',', ' ', $tag->product_tags_hin)) }}">{{ str_replace(',', ' ', $tag->product_tags_hin) }}</a>
                @endforeach

            @else
                @foreach ($pdt_tag_en as $tag)
                    <a class="item active"
                        href="{{ route('tag.product', str_replace(',', ' ', $tag->product_tags_en)) }}">{{ str_replace(',', ' ', $tag->product_tags_en) }}</a>
                @endforeach
            @endif



        </div>
        <!-- /.tag-list -->
    </div>
    <!-- /.sidebar-widget-body -->
</div>
