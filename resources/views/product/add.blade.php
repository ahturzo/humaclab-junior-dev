@extends('layouts.app')

@section('top-link')
	<style>
		.table-bordered {
			    border: 0px solid #dee2e6;
			}
		.table-bordered td {
			    border: 0px solid #dee2e6;
			}
	</style>
@endsection

@section('content')
<div class="container">
	<h2 class="text-center">Add a new product</h2><hr>

	<form class="jumbotron p-3 p-md-5 text-white rounded bg-dark" action="{{ route('product.store') }}" method="post"> {{ csrf_field() }}

		<div class="row">
			<div class="col-md-4 col-6">
				<div class="text-md-center">
					<b>Product Name</b>
				</div>
			</div>
			<div class="col-md-8 col-6">
				<div class="text-md-center">
					<div class="form-group">
				      <input type="text" class="form-control" name="name" placeholder="Enter Product Name" required>
				    </div>
				</div>
			</div>	
		</div>

		<div class="row">
			<div class="col-md-4 col-6">
				<div class="text-md-center">
					<b>Product Catagory</b>
				</div>
			</div>
			<div class="col-md-8 col-6">
				<div class="text-md-center">
					<div class="form-group">
						<select class="custom-select" name="category_id" required>
							<option disabled selected>Select Catagory</option>
							    @foreach($category as $cat)
							      	<option value="{{ encrypt($cat->id) }}">{{ $cat->name }}</option>
							    @endforeach
						</select>
					</div>
				</div>
			</div>	
		</div>

		<div class="row">
			<div class="col-md-4 col-6">
				<div class="text-md-center">
					<b>Brand Name of The Product</b>
				</div>
			</div>
			<div class="col-md-8 col-6">
				<div class="text-md-center">
					<div class="form-group">
				      <input type="text" class="form-control" name="brand" placeholder="Product Brand Name" required>
				    </div>
				</div>
			</div>	
		</div>

		<div class="row">
			<div class="col-md-4 col-6">
				<div class="text-md-center">
					<b>Product Price</b>
				</div>
			</div>
			<div class="col-md-8 col-6">
				<div class="text-md-center">
					<div class="form-group">
				      <input type="text" class="form-control" name="price" placeholder="Enter Product Price" required>
				    </div>
				</div>
			</div>	
		</div><hr>

		<div class="row">
			<div class="col-md-12 text-center py-3">
				<h3>Add Product Attribute with Custom Variant category</h3>
			</div>
		</div>

		<div class="row">
			<div class="col-12 text-center">Ex: Variant Category = "Color", Variant Attribute = "Red"</div>
			<div class="col-md-12 col-12">
				<div class="text-md-center">
					<div class="form-group"> 
						<div class="table-responsive">
                            <table class="table table-bordered" id="dynamic_field">  
                                <tr>  
                                    <td>
                                        <input type="text" name="variant[]" placeholder="Variant Category" class="form-control variant_list">
                                    </td>
                                    <td>
                                        <input type="text" name="value[]" placeholder="Variant Attribute" class="form-control value_list">
                                    </td>  
                                    <td>
                                        <button type="button" name="add" id="add" class="btn btn-success btn-sm">Add More</button>
                                    </td>  
                                </tr>  
                            </table>
                        </div>
				    </div>
				</div>
			</div>	
		</div>

		<div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-secondary">{{ __('Add Product Details') }}</button>
            </div>
        </div>
	</form>
</div>
@endsection

@section('bottom-js')
<script>  
   $(document).ready(function(){  
        var i=1;  
        $('#add').click(function(){  
             i++;  
             $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="variant[]" placeholder="Variant Category" class="form-control variant_list" /></td><td><input type="text" name="value[]" placeholder="Variant Attribute" class="form-control value_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>'); 
        });  
        $(document).on('click', '.btn_remove', function(){  
             var button_id = $(this).attr("id");   
             $('#row'+button_id+'').remove();  
        });  
        $('#submit').click(function(){            
             $.ajax({  
                  url:"name.php",  
                  method:"POST",  
                  data:$('#add_name').serialize(),  
                  success:function(data)  
                  {  
                       alert(data);  
                       $('#add_name')[0].reset();  
                  }  
             });  
        });  
   });  
</script>
@endsection