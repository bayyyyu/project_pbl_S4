<x-web.app-webNoSlider>
	<div class="shop-page padding-tb">
            <div class="container">
                <div class="section-wrapper">
                    <div class="row justify-content-center">
                        <div class="col-lg-9 col-12">
                            <article>
								<div class="post-item-2">
									<div class="post-inner">
										<div class="post-content text-center">
											<h4>Daftar Event</h4>
											<hr>
										</div>
									</div>
								</div>
                                <div class="shop-title d-flex flex-wrap justify-content-between bg-ash">
                                    <p>...</p>
                                    <div class="product-view-mode">
                                        <a class="active" data-target="grids"><i class="icofont-ghost"></i></a>
                                        <a data-target="lists"><i class="icofont-listing-box"></i></a>
                                    </div>
                                </div>

                                <div class="shop-product-wrap grids row justify-content-center">
                                    @foreach($list_event as $event)
                                    <div class="col-lg-4 col-md-6 col-12">
                                        <div class="product-item">
                                            <div class="product-thumb">
                                                <img src="{{asset($event->foto)}}" alt="mangrove api-api " style="height:170px; object-fit:cover">
                                                <div class="product-action-link">
                                                    <a href="{{asset($event->foto)}}" data-rel="lightcase"><i
                                                            class="icofont-eye"></i></a>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <h6>{{$event->nama_event}}</h6>
                                            </div>
                                        </div>
                                        <div class="product-list-item">
                                            <div class="product-thumb">
                                                <img src="{{asset($event->foto)}}" alt="shope">
                                                <div class="product-action-link">
                                                    <a href="{{asset($event->foto)}}" data-rel="lightcase"><i
                                                            class="icofont-eye"></i></a>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <h6>Event: {{$event->nama_event}}</h6>
                                                <hr>
                                                <p style="font-size:13px">Deskripsi Event</p>
													<p style="text-align: justify">{{$event->deskripsi}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</x-web.app-webNoSlider>
