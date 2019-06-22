<!-- Details Modal -->
<div class="modal fade" id="detailsModal" tabindex="-1" role="dialog" aria-labelledby="detailsModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
{{--            <div class="modal-header">--}}
{{--                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>--}}
{{--                <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                    <span aria-hidden="true">&times;</span>--}}
{{--                </button>--}}
{{--            </div>--}}
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="well well-sm">
                                <div class="row">
{{--                                    <div class="col-sm-2 col-md-2" id="content">--}}

{{--                                        <img style=" padding-right:50px; width: 200px; height: 250px"  src="{{asset('assets/img/icons/common/female1.png')}}" alt="" class="img-rounded img-responsive fluidimage" />--}}
{{--                                       <!--http://placehold.it/200x250-->--}}
{{--                                    </div>--}}
                                                            <div class="col-md-6" id="content">
                                                                  <img class="img-thumbnail img-responsive fluid-image img-rounded" alt="Image placeholder" src="{{asset(Auth::User()->image)}}">
                                                            </div>
                                    <div class="col-sm-4 col-md-4" style="margin-left: 0px">
                                        <h4 id="prof_name">Bhaumik Patel <small>(Administrator)</small></h4>
                                        <div>
                                            <i class="fas fa-map-marker"></i>
                                            <small><country id="prof_country" title="San Francisco, USA">San Francisco, USA </country></small>
                                        </div>
                                        <br>
                                        <div>
                                            <p id="prof_gender">
                                                <i class="fa fa-venus-mars"></i>
                                                Male
                                            </p>
                                        </div>
                                        <div>
                                            <p id="prof_email">
                                                <i class="fas fa-envelope"></i>
                                                email@example.com
                                            </p>
                                        </div>
                                        <div>
                                            <p id="prof_phone">
                                                <i class="fas fa-mobile-alt"></i>
                                                01003989186
                                            </p>
                                        </div>

                                        <div style="margin-top: 55px">
                                            <button type="button" style="width: 200px" class="btn btn-danger" data-dismiss="modal">Close</button>

                                        </div>



                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
{{--            <div class="modal-footer">--}}
{{--                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>--}}
{{--            </div>--}}
        </div>
    </div>
</div>