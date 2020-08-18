@extends('layouts.dashmaster')
@section('content')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="">الرئيسية </a>
                            </li>
                        <li class="breadcrumb-item"><a href="{{LaravelLocalization::localizeUrl('/dash/show')}}"> الاقسام الرئيسية </a>
                            </li>
                            <li class="breadcrumb-item active">إضافة قسم رئيسي
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- Basic form layout section start -->
            <section id="basic-form-layouts">
                <div class="row match-height">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title" id="basic-layout-form"> إضافة قسم رئيسي </h4>
                                <a class="heading-elements-toggle"><i
                                        class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        <li><a data-action="close"><i class="ft-x"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                          
                            
                            <div class="card-content collapse show">
                                <div class="card-body">
                                <form class="form" action="{{$cat->id}}" method="POST"
                                          enctype="multipart/form-data">
                                          @csrf
                                          @method('PUT')

                                        <div class="form-group">
                                            <label> صوره القسم  </label>
                                            <label id="projectinput7" class="file center-block">
                                            <input type="file" value="{{$cat->photo}}" id="file" name="photo" >
                                                <span class="file-custom"></span>
                                            </label>
                                             <span class="text-danger"> </span>
                                         </div>

                                        <div class="form-body">
                                            <h4 class="form-section"><i class="ft-home"></i> بيانات  القسم </h4>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> اسم القسم </label>
                                                        <input type="text" value="{{$cat->name}}" id="name"
                                                               class="form-control"
                                                             
                                                    name="name" >
                                                         <span class="text-danger"></span>
                                                     </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> كود القسم </label>
                                                        <input type="text" value="{{$cat->code}}" id="name"
                                                               class="form-control"
                                                              
                                                               name="code" >
                                                         <span class="text-danger"> </span>
                                                     </div>
                                                </div>
                                            </div>



                                            <div class="row">

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput2"> الاتجاة </label>
                                                        <select name="direction" class="select2 form-control">
                                                            <optgroup label="من فضلك أختر اتجاه اللغة ">
                                                                <option value="rtl">من اليمين الي اليسار</option>
                                                                <option value="ltr">من اليسار الي اليمين</option>
                                                            </optgroup>
                                                        </select>
                                                         <span class="text-danger"></span>
                                                     </div>
                                                </div>
                                            </div>


                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group mt-1">
                                                        <input type="checkbox"  value="1" name="active"
                                                               id="switcheryColor4"
                                                               class="switchery" data-color="success"
                                                               checked/>
                                                        <label for="switcheryColor4"
                                                               class="card-title ml-1">الحالة </label>

                                                        <span class="text-danger"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="form-actions">
                                            <button type="button" class="btn btn-warning mr-1"
                                                    onclick="history.back();">
                                                <i class="ft-x"></i> تراجع
                                            </button>
                                            <button type="submit" class="btn btn-primary">
                                                <i class="la la-check-square-o"></i> تحديث
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- // Basic form layout section end -->
        </div>
    </div>
</div>
@endsection