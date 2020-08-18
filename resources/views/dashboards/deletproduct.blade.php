@extends('layouts.dashmaster')

@section('content')


<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-12 col-12 mb-2">
              <form class="form" action="/dash/seal" method="POST"
              enctype="multipart/form-data">
              @csrf;
              
              <div class="form-body">
                <h4 class="form-section"><i class="ft-home"></i> بيانات  المنتج </h4>

                



                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="projectinput2"> اسم المنتج </label>
                           
                            <select name="cat" class="select2 form-control">
                                <optgroup label="من فضلك أختر اسم  المنتج ">
                                   
                                  
                                    @foreach ($product as  $item)
                                    <option value="{{  $item->name}}"> {{  $item->name}}</option>
                                    @endforeach
                                   
                                </optgroup>
                            </select>
                             <span class="text-danger"></span>
                         </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="projectinput2"> عدد القطع </label>
                            <input type="text" value="" id="number"
                                   class="form-control"
                                   placeholder="ادخل عدد القطع  "
                                   name="number" required>
                             <span class="text-danger"> </span>
                            
                         </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="projectinput2"> رقم العمليه </label>
                            <input type="text" value="" id="number"
                                   class="form-control"
                                   placeholder="ادخل رقم العمليه  "
                                   name="op" required>
                             <span class="text-danger"> </span>
                            
                         </div>
                    </div>
                </div>


               
            </div>


            <div class="form-actions">
                <button type="submit" class="btn btn-warning mr-1"
                      name="show">
                    <i class="ft-x"></i> عرض
                </button>
                <button type="submit" class="btn btn-primary">
                    <i class="la la-check-square-o"></i> حفظ
                </button>
            </div>
              </form>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                      <table class="table">
                        <thead class="thead-dark">
                          <tr>
                            
                            <th scope="col">name</th>
                            <th scope="col">price</th>
                          
                            <th scope="col">number_o_p</th>
                            <th scope="col">Handle</th>
                          </tr>
                        </thead>
                        <tbody>
                         
                          @foreach ($s as  $item)
         
                    <tr>
                    
                    
                       <td class="col-md-9-md-3">{{$item['name']}}</td>
                      <td class="col-md-9-md-2">{{$item['price']*$item['n_o_p']}}</td>
                      <td class="col-md-9-md-2">{{$item['n_o_p']}}</td>
                     
                     
                      
                      <td class="col-md-9-md-2">
                     <form method="GET" action="route('showcat')">
                     @method('DELETE')
                     @csrf
                      <a href="/dash/show/{{$item['id']}}">
                       
                        
                          <span class="glyphicon glyphicon-remove"></span>
                        </a>
                     
                      <a href="/dash/editecat/{{$item['id']}}">
                          <span class="glyphicon glyphicon-edit"></span>
                        </a>
                      </form>
                      </td>
                    </tr>
                   
                @endforeach
              
                        </tbody>
                      </table>
                      
                    
                   
                </div>
            </div>
          </div>
    </div>
  </div>

    
 
     
  
    

    
  
@endsection