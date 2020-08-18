@extends('layouts.dashmaster')

@section('content')

<div class="app-content content">
  <div class="content-wrapper">
      <div class="content-header row">
          <div class="content-header-left col-md-12 col-12 mb-2">
            <form class="form" action="/dash/showproduct" method="POST"
            enctype="multipart/form-data">
            @csrf;
            
            <div class="form-group">
                <label for="projectinput1"> اسم المنتج </label>
                <input type="text" value="" id="name"
                       class="form-control"
                       placeholder="ادخل اسم المنتج  "
                       name="name">
                 <span class="text-danger"></span>
            
            
                
                <button type="submit" class="btn btn-primary">
                    <i class="la la-check-square-o"></i> بحث
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
                          <th scope="col">photo</th>
                          <th scope="col">Handle</th>
                        </tr>
                      </thead>
                      <tbody>
                       
                        @foreach ($product as  $item)
       
                  <tr>
                  
                  
                     <td class="col-md-9-md-3">{{$item['name']}}</td>
                    <td class="col-md-9-md-2">{{$item['price']}}</td>
                    <td class="col-md-9-md-2">{{$item['number']}}</td>
                    <td><img src="{{asset('storage/photo/'.$item->photo)}}" width=200px ></td>
                    
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
</div>
     
       
    

    
  
@endsection