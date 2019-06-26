{{-- <div class="size-guide d-md-flex">

    @if ($size_guide->image)
        <div class="size-guide-image m-auto text-center">
            <img src="{{ $size_guide->image }}" />
        </div>
    @endif

    <div class="size-guide-table">
        <div class="d-table">
            <div class="d-table-row row-head">
                <div class="d-table-cell text-center text-uppercase head"></div>
                <div class="d-table-cell text-center text-uppercase head">Bystvidd</div>
                <div class="d-table-cell text-center text-uppercase head">Midjevidd</div>
                <div class="d-table-cell text-center text-uppercase head">Stussvidd</div>
            </div>
            <div class="d-table-row">
                <div class="d-table-cell size text-right text-right">
                XS
                </div>
                <div class="d-table-cell text-center">
                <div>78-82</div>
                <div>62-66</div>
                <div>96-90</div>
                </div>
                <div class="d-table-cell text-center">
                <div>78-82</div>
                <div>62-66</div>
                <div>96-90</div>
                </div>
                <div class="d-table-cell text-center">
                <div>78-82</div>
                <div>62-66</div>
                <div>96-90</div>
                </div>
            </div>
            <div class="d-table-row spacer"></div>
            <div class="d-table-row">
                <div class="d-table-cell size text-right">
                S
                </div>
                <div class="d-table-cell text-center">
                <div>78-82</div>
                <div>62-66</div>
                <div>96-90</div>
                </div>
                <div class="d-table-cell text-center">
                <div>78-82</div>
                <div>62-66</div>
                <div>96-90</div>
                </div>
                <div class="d-table-cell text-center">
                <div>78-82</div>
                <div>62-66</div>
                <div>96-90</div>
                </div>
            </div>
            <div class="d-table-row spacer"></div>
            <div class="d-table-row">
                <div class="d-table-cell size text-right">
                M
                </div>
                <div class="d-table-cell text-center">
                <div>78-82</div>
                <div>62-66</div>
                <div>96-90</div>
                </div>
                <div class="d-table-cell text-center">
                <div>78-82</div>
                <div>62-66</div>
                <div>96-90</div>
                </div>
                <div class="d-table-cell text-center">
                <div>78-82</div>
                <div>62-66</div>
                <div>96-90</div>
                </div>
            </div>
            <div class="d-table-row spacer"></div>
            <div class="d-table-row">
                <div class="d-table-cell size text-right">
                L
                </div>
                <div class="d-table-cell text-center">
                <div>78-82</div>
                <div>62-66</div>
                <div>96-90</div>
                </div>
                <div class="d-table-cell text-center">
                <div>78-82</div>
                <div>62-66</div>
                <div>96-90</div>
                </div>
                <div class="d-table-cell text-center">
                <div>78-82</div>
                <div>62-66</div>
                <div>96-90</div>
                </div>
            </div>
            <div class="d-table-row spacer"></div>
            <div class="d-table-row">
                <div class="d-table-cell size text-right">
                XL
                </div>
                <div class="d-table-cell text-center">
                <div>78-82</div>
                <div>62-66</div>
                <div>96-90</div>
                </div>
                <div class="d-table-cell text-center">
                <div>78-82</div>
                <div>62-66</div>
                <div>96-90</div>
                </div>
                <div class="d-table-cell text-center">
                <div>78-82</div>
                <div>62-66</div>
                <div>96-90</div>
                </div>
            </div>
            <div class="d-table-row spacer"></div>
            <div class="d-table-row">
                <div class="d-table-cell size text-right">
                XXL
                </div>
                <div class="d-table-cell text-center">
                <div>78-82</div>
                <div>62-66</div>
                <div>96-90</div>
                </div>
                <div class="d-table-cell text-center">
                <div>78-82</div>
                <div>62-66</div>
                <div>96-90</div>
                </div>
                <div class="d-table-cell text-center">
                <div>78-82</div>
                <div>62-66</div>
                <div>96-90</div>
                </div>
            </div>
            <div class="d-table-row spacer"></div>
            <div class="d-table-row">
                <div class="d-table-cell size text-right">
                XXXL
                </div>
                <div class="d-table-cell text-center">
                <div>78-82</div>
                <div>62-66</div>
                <div>96-90</div>
                </div>
                <div class="d-table-cell text-center">
                <div>78-82</div>
                <div>62-66</div>
                <div>96-90</div>
                </div>
                <div class="d-table-cell text-center">
                <div>78-82</div>
                <div>62-66</div>
                <div>96-90</div>
                </div>
            </div>
        </div>
    </div>
</div>   --}}

<div class="size-guide d-md-flex">

        @if ($size_guide->image)
            <div class="size-guide-image m-auto text-center">
                <img src="{{ $size_guide->image }}" />
            </div>
        @endif
    
        @if (!empty($size_guide->chart))
            <div class="size-guide-table">
                <div class="d-table">

                    {{-- Table Header --}}
                    @if (!empty($size_guide->chart->header_x))
                        <div class="d-table-row row-head">
                            <div class="d-table-cell text-center text-uppercase head"></div>
        
                            @foreach ($size_guide->chart->header_x as $head)
                                <div class="d-table-cell text-center text-uppercase head">{!! $head !!}</div>
                            @endforeach
                        </div>
                    @endif
    
                    @if (!empty($size_guide->chart->content))
                        @foreach ($size_guide->chart->content as $key=>$row)
                            <div class="d-table-row">
                                <div class="d-table-cell size text-right text-right">{!! $key !!}</div>

                                @if ($row)
                                    @foreach ($row as $item)
                                        <div class="d-table-cell text-center">
                                            @if ($item)
                                                @foreach ($item as $val)
                                                    <div>{!! $val !!}</div>
                                                @endforeach
                                            @endif
                                        </div>                                  
                                    @endforeach
                                @endif

                            </div>

                            @if (!$loop->last)
                            <div class="d-table-row spacer"></div>
                            @endif

                        @endforeach
                    @endif
                </div>
            </div>
        @endif
    </div>  