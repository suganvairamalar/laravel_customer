@extends('layouts.customer_app')
@section('content')
<div class="jumbotron">
   <div class="row">
      <div class="pull-left">
         <button type="button" name="customer_create_record" id="customer_create_record" class="btn btn-success btn-sm">CUSTOMER ADD</button>
      </div>
      <div class="pull-right">
         <!-- <div class="form-group form-inline">
            <form id="customer_search_form" action="/customers">
               {{ csrf_field() }}
               {{ method_field('GET') }}
               <label >SEARCH</label>
               <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
               <input type="text" class="form-control" name="search" id="search">
               <button type="submit" class="btn btn-warning" id="known_technology_search_submit" name="known_technology_search_submit">
               <span class="glyphicon glyphicon-search"></span></button> 
               <a href="{{route('customer.index')}}" class="btn btn-primary"><span class="reloadbtn glyphicon glyphicon-refresh"></span></a>                      
            </form>
         </div> -->
      </div>
   </div>
   <div class="row">
      @include('customers.customer_list')   
   </div>
</div>
<div class="row">
   <div id="customer_form_Modal" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">
         <div class="modal-content">
            <div class="modal-header bg-danger">
               <label class="modal-title">CUSTOMER ADD FORM</label>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="start_cloes"><span aria-hidden="true">&times;</span>
               </button>
            </div>
            <form method="post" id="customer_form" class="form-horizontal">
               <div class="modal-body bg-primary">
                  <span id="customer_form_result"></span>
                  {{ csrf_field() }}
                  <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                  <div class="form-group">
                     <label class="control-label1 col-md-4 col-lg-4 col-xs-4 col-sm-4">NAME</label>
                     <div class="col-md-8 col-lg-8 col-xs-8 col-sm-8">
                        <input type="text" class="form-control" name="customer_name" id="customer_name" placeholder="Enter a Customer Name">
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="control-label1 col-md-4 col-lg-4 col-xs-4 col-sm-4">MOBILE</label>
                     <div class="col-md-8 col-lg-8 col-xs-8 col-sm-8">
                        <input type="text" class="form-control" name="mobile" id="mobile" placeholder="Enter a Customer Mobile">
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="control-label1 col-md-4 col-lg-4 col-xs-4 col-sm-4">EMAIL</label>
                     <div class="col-md-8 col-lg-8 col-xs-8 col-sm-8">
                        <input type="text" class="form-control" name="email" id="email" placeholder="Enter a Customer Email">
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="control-label1 col-md-4 col-lg-4 col-xs-4 col-sm-4">ADDRESS1</label>
                     <div class="col-md-8 col-lg-8 col-xs-8 col-sm-8">
                        <input type="text" class="form-control" name="address1" id="address1" placeholder="Enter a Customer Address1">
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="control-label1 col-md-4 col-lg-4 col-xs-4 col-sm-4">ADDRESS2</label>
                     <div class="col-md-8 col-lg-8 col-xs-8 col-sm-8">
                        <input type="text" class="form-control" name="address2" id="address2" placeholder="Enter a Customer Address2">
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="control-label1 col-md-4 col-lg-4 col-xs-4 col-sm-4">CITY</label>
                     <div class="col-md-8 col-lg-8 col-xs-8 col-sm-8">
                        <input type="text" class="form-control" name="city" id="city" placeholder="Enter a Customer City">
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="control-label1 col-md-4 col-lg-4 col-xs-4 col-sm-4">PINCODE</label>
                     <div class="col-md-8 col-lg-8 col-xs-8 col-sm-8">
                        <input type="text" class="form-control" name="pincode" id="pincode" placeholder="Enter a Customer Pincode">
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="control-label1 col-md-4 col-lg-4 col-xs-4 col-sm-4">STATE</label>
                     <div class="col-md-8 col-lg-8 col-xs-8 col-sm-8">
                        <input type="text" class="form-control" name="state" id="state" placeholder="Enter a Customer Pincode">
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="control-label1 col-md-4 col-lg-4 col-xs-4 col-sm-4">COUNTRY</label>
                     <div class="col-md-8 col-lg-8 col-xs-8 col-sm-8">
                        <input type="text" class="form-control" name="country" id="country" placeholder="Enter a Customer Country">
                     </div>
                  </div>
               </div>
               <div class="modal-footer bg-danger">
                  <input type="hidden" name="hidden_id" id="hidden_id" class="form-control">   
                  <input type="hidden" name="customer_action" id="customer_action" />
                  <button type="button" class="btn btn-secondary" id="cloes" data-dismiss="modal">CLOSE</button>
                  <input type="submit" name="customer_action_button" id="customer_action_button" class="btn btn-primary" value="ADD">
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
<div class="row">
   <div id="customer_confirm_Modal" class="modal fade" role="dialog">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header bg-danger">
               <label class="modal-title">CONFIRMATION</label>
               <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
               <p style="color:red;font-size:16px;font-weight: bold;font-style: italic;">Are you sure !! want to delete this record?</p>
            </div>
            <div class="modal-footer bg-danger">
               <button type="button" name="customer_ok_button" id="customer_ok_button" class="btn btn-danger">OK</button>
               <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection