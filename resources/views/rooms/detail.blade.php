@extends('layouts.master')

@section('breadcrumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm text-dark"><a class="opacity-5 text-dark" href="javascript:;">Dashboard</a>
        </li>
        <li class="breadcrumb-item text-sm text-dark"><a class="opacity-5 text-dark" href="javascript:;">Manajemen
                Kamar</a></li>
        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Detail Kamar</li>
    </ol>
    <h6 class="font-weight-bolder mb-0">Detail Kamar</h6>
</nav>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h5 class="mb-4">Detail Kamar</h5>
                <div class="row">
                    <div class="col-xl-5 col-lg-6 text-center">
                        <img src="https://arsitagx-master-article.s3.ap-southeast-1.amazonaws.com/article-photo/581/desain-kamar-kos-simpel-dan-keren-1.jpg" class="w-80 min-height-100 border-radius-lg shadow" alt="Responsive image">
                        <!-- Root element of PhotoSwipe. Must have class pswp. -->
                        <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
                            <!-- Background of PhotoSwipe. It's a separate element, as animating opacity is faster than rgba(). -->
                            <div class="pswp__bg"></div>
                            <!-- Slides wrapper with overflow:hidden. -->
                            <div class="pswp__scroll-wrap">
                                <!-- Container that holds slides. PhotoSwipe keeps only 3 slides in DOM to save memory. -->
                                <!-- don't modify these 3 pswp__item elements, data is added later on. -->
                                <div class="pswp__container">
                                    <div class="pswp__item"></div>
                                    <div class="pswp__item"></div>
                                    <div class="pswp__item"></div>
                                </div>
                                <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
                                <div class="pswp__ui pswp__ui--hidden">
                                    <div class="pswp__top-bar">
                                        <!--  Controls are self-explanatory. Order can be changed. -->
                                        <div class="pswp__counter"></div>
                                        <button class="btn btn-white btn-sm pswp__button pswp__button--close">Close
                                            (Esc)</button>
                                        <button class="btn btn-white btn-sm pswp__button pswp__button--fs">Fullscreen</button>
                                        <button class="btn btn-white btn-sm pswp__button pswp__button--arrow--left">Prev
                                        </button>
                                        <button class="btn btn-white btn-sm pswp__button pswp__button--arrow--right">Next
                                        </button>
                                        <!-- Preloader demo https://codepen.io/dimsemenov/pen/yyBWoR -->
                                        <!-- element will get class pswp__preloader--active when preloader is running -->
                                        <div class="pswp__preloader">
                                            <div class="pswp__preloader__icn">
                                                <div class="pswp__preloader__cut">
                                                    <div class="pswp__preloader__donut"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                                        <div class="pswp__share-tooltip"></div>
                                    </div>
                                    <div class="pswp__caption">
                                        <div class="pswp__caption__center"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 mx-auto">
                        <h3 class="mt-lg-0 mt-4">{{ $room->name }}</h3>
                        <div class="rating">
                            {{ $room->roomType->name }}
                        </div>
                        <br>
                        <h6 class="mb-0 mt-3">Harga</h6>
                        <h5>Rp
                            {{ number_format($room->roomType->price,0,',','.') }}
                        </h5>
                        @if ($room->status == 'available')
                        <span class="badge badge-success text-dark">Tersedia</span>
                        @else
                        <span class="badge badge-danger text-dark">Terisi</span>
                        @endif
                        <br>
                        <label class="mt-4">Deskripsi</label>
                        <p style="margin-left: 5px" class="mb-0">
                            {!! $room->description !!}
                        </p>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12">
                        <h5 class="ms-3 mb-3">Fasilitas</h5>
                        <div class="overflow-scroll">
                            <div class=" d-flex">
                                <div class="col-lg-1 col-md-2 col-sm-3 col-4 text-center">
                                    <div class="avatar avatar-lg rounded-circle border shadow">
                                        <i class="fas fa-wifi text-dark" style="font-size: 16px"></i>
                                    </div>
                                    <p class="mb-0 mt-2 text-sm">Wifi</p>
                                </div>
                                <div class="col-lg-1 col-md-2 col-sm-3 col-4 text-center">
                                    <div class="avatar avatar-lg rounded-circle border shadow">
                                        <i class="fas fa-bold text-dark" style="font-size: 16px"></i>
                                    </div>
                                    <p class="mb-0 mt-2 text-sm">Listrik</p>
                                </div>
                                <div class="col-lg-1 col-md-2 col-sm-3 col-4 text-center">
                                    <div class="avatar avatar-lg rounded-circle border shadow">
                                        <i class="fas fa-tint text-dark" style="font-size: 16px"></i>
                                    </div>
                                    <p class="mb-0 mt-2 text-sm">Air</p>
                                </div>
                                <div class="col-lg-1 col-md-2 col-sm-3 col-4 text-center">
                                    <div class="avatar avatar-lg rounded-circle border shadow">
                                        <i class="fas fa-fan text-dark" style="font-size: 16px"></i>
                                    </div>
                                    <p class="mb-0 mt-2 text-sm">Kipas Angin</p>
                                </div>
                                <div class="col-lg-1 col-md-2 col-sm-3 col-4 text-center">
                                    <div class="avatar avatar-lg rounded-circle border shadow">
                                        <i class="fas fa-bed text-dark" style="font-size: 16px"></i>
                                    </div>
                                    <p class="mb-0 mt-2 text-sm">Kasur</p>
                                </div>
                                <div class="col-lg-1 col-md-2 col-sm-3 col-4 text-center">
                                    <div class="avatar avatar-lg rounded-circle border shadow">
                                        <i class="fas fa-toilet text-dark" style="font-size: 16px"></i>
                                    </div>
                                    <p class="mb-0 mt-2 text-sm">Kloset Duduk</p>
                                </div>
                                <div class="col-lg-1 col-md-2 col-sm-3 col-4 text-center">
                                    <div class="avatar avatar-lg rounded-circle border shadow">
                                        <i class="fas fa-couch text-dark" style="font-size: 16px"></i>
                                    </div>
                                    <p class="mb-0 mt-2 text-sm">Sofa</p>
                                </div>
                                <div class="col-lg-1 col-md-2 col-sm-3 col-4 text-center">
                                    <div class="avatar avatar-lg rounded-circle border shadow">
                                        <i class="fas fa-bath text-dark" style="font-size: 16px"></i>
                                    </div>
                                    <p class="mb-0 mt-2 text-sm">Kamar Mandi Dalam</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
<script src="{{ asset('assets/js/plugins/photoswipe-ui-default.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/photoswipe.min.js') }}"></script>
<script>
    if (document.getElementById('products-carousel')) {
        var myCarousel = document.querySelector('#products-carousel')
        var carousel = new bootstrap.Carousel(myCarousel)
    }


    // Products gallery
    var initPhotoSwipeFromDOM = function(gallerySelector) {

        // parse slide data (url, title, size ...) from DOM elements
        // (children of gallerySelector)
        var parseThumbnailElements = function(el) {
            var thumbElements = el.childNodes,
                numNodes = thumbElements.length,
                items = [],
                figureEl,
                linkEl,
                // size,
                item;

            for (var i = 0; i < numNodes; i++) {

                figureEl = thumbElements[i]; // <figure> element
                // include only element nodes
                if (figureEl.nodeType !== 1) {
                    continue;
                }

                linkEl = figureEl.children[0]; // <a> element

                size = linkEl.getAttribute('data-size').split('x');

                // create slide object
                item = {
                    src: linkEl.getAttribute('href'),
                    w: parseInt(size[0], 10),
                    h: parseInt(size[1], 10)
                };

                if (figureEl.children.length > 1) {
                    // <figcaption> content
                    item.title = figureEl.children[1].innerHTML;
                }

                if (linkEl.children.length > 0) {
                    // <img> thumbnail element, retrieving thumbnail url
                    item.msrc = linkEl.children[0].getAttribute('src');
                }

                item.el = figureEl; // save link to element for getThumbBoundsFn
                items.push(item);
            }

            return items;
        };

        // find nearest parent element
        var closest = function closest(el, fn) {
            return el && (fn(el) ? el : closest(el.parentNode, fn));
        };

        // triggers when user clicks on thumbnail
        var onThumbnailsClick = function(e) {
            e = e || window.event;
            e.preventDefault ? e.preventDefault() : e.returnValue = false;

            var eTarget = e.target || e.srcElement;

            // find root element of slide
            var clickedListItem = closest(eTarget, function(el) {
                return (el.tagName && el.tagName.toUpperCase() === 'FIGURE');
            });

            if (!clickedListItem) {
                return;
            }

            // find index of clicked item by looping through all child nodes
            // alternatively, you may define index via data- attribute
            var clickedGallery = clickedListItem.parentNode,
                childNodes = clickedListItem.parentNode.childNodes,
                numChildNodes = childNodes.length,
                nodeIndex = 0,
                index;

            for (var i = 0; i < numChildNodes; i++) {
                if (childNodes[i].nodeType !== 1) {
                    continue;
                }

                if (childNodes[i] === clickedListItem) {
                    index = nodeIndex;
                    break;
                }
                nodeIndex++;
            }



            if (index >= 0) {
                // open PhotoSwipe if valid index found
                openPhotoSwipe(index, clickedGallery);
            }
            return false;
        };

        // parse picture index and gallery index from URL (#&pid=1&gid=2)
        var photoswipeParseHash = function() {
            var hash = window.location.hash.substring(1),
                params = {};

            if (hash.length < 5) {
                return params;
            }

            var vars = hash.split('&');
            for (var i = 0; i < vars.length; i++) {
                if (!vars[i]) {
                    continue;
                }
                var pair = vars[i].split('=');
                if (pair.length < 2) {
                    continue;
                }
                params[pair[0]] = pair[1];
            }

            if (params.gid) {
                params.gid = parseInt(params.gid, 10);
            }

            return params;
        };

        var openPhotoSwipe = function(index, galleryElement, disableAnimation, fromURL) {
            var pswpElement = document.querySelectorAll('.pswp')[0],
                gallery,
                options,
                items;

            items = parseThumbnailElements(galleryElement);

            // define options (if needed)
            options = {

                // define gallery index (for URL)
                galleryUID: galleryElement.getAttribute('data-pswp-uid'),

                getThumbBoundsFn: function(index) {
                    // See Options -> getThumbBoundsFn section of documentation for more info
                    var thumbnail = items[index].el.getElementsByTagName('img')[
                            0], // find thumbnail
                        pageYScroll = window.pageYOffset || document.documentElement.scrollTop,
                        rect = thumbnail.getBoundingClientRect();

                    return {
                        x: rect.left,
                        y: rect.top + pageYScroll,
                        w: rect.width
                    };
                }

            };

            // PhotoSwipe opened from URL
            if (fromURL) {
                if (options.galleryPIDs) {
                    // parse real index when custom PIDs are used
                    // http://photoswipe.com/documentation/faq.html#custom-pid-in-url
                    for (var j = 0; j < items.length; j++) {
                        if (items[j].pid == index) {
                            options.index = j;
                            break;
                        }
                    }
                } else {
                    // in URL indexes start from 1
                    options.index = parseInt(index, 10) - 1;
                }
            } else {
                options.index = parseInt(index, 10);
            }

            // exit if index not found
            if (isNaN(options.index)) {
                return;
            }

            if (disableAnimation) {
                options.showAnimationDuration = 0;
            }

            // Pass data to PhotoSwipe and initialize it
            gallery = new PhotoSwipe(pswpElement, PhotoSwipeUI_Default, items, options);
            gallery.init();
        };

        // loop through all gallery elements and bind events
        var galleryElements = document.querySelectorAll(gallerySelector);

        for (var i = 0, l = galleryElements.length; i < l; i++) {
            galleryElements[i].setAttribute('data-pswp-uid', i + 1);
            galleryElements[i].onclick = onThumbnailsClick;
        }

        // Parse URL and open gallery if it contains #&pid=3&gid=1
        var hashData = photoswipeParseHash();
        if (hashData.pid && hashData.gid) {
            openPhotoSwipe(hashData.pid, galleryElements[hashData.gid - 1], true, true);
        }
    };

    // execute above function
    initPhotoSwipeFromDOM('.my-gallery');
</script>
@endpush