@extends('layouts.dashmaster')

@section('content')

<div class="app-content content">
  <div class="content-wrapper">
      <div class="content-header row">
          <div class="content-header-left col-md-12 col-12 mb-2">
           
           
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
                       
                        @foreach ($p as  $item)
       {{dd($p)}}
                        <tr>
                        
                        
                           <td class="col-md-9-md-3">{{$item}}</td>
                          <td class="col-md-9-md-2">{{$item}}</td>
                          <td class="col-md-9-md-2">{{$item}}</td>
                         
                          
                          <td class="col-md-9-md-2">
                         <form method="GET" action="route('showcat')">
                         @method('DELETE')
                         @csrf
                          <a href="/dash/show/{{$item}}">
                           
                            
                              <span class="glyphicon glyphicon-remove"></span>
                            </a>
                         
                          <a href="/dash/editecat/{{$item}}">
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