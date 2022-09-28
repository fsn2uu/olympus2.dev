<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>
    <body>
      <div class="container">
           <form action="">
               
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="general-tab" data-toggle="tab" href="#general" role="tab" aria-controls="general" aria-selected="false">General</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="location-tab" data-toggle="tab" href="#location" role="tab" aria-controls="location" aria-selected="true">Location</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="photos-tab" data-toggle="tab" href="#photos" role="tab" aria-controls="photos" aria-selected="false">Photos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="amenities-tab" data-toggle="tab" href="#amenities" role="tab" aria-controls="amenities" aria-selected="false">Amenities</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="availabilities-tab" data-toggle="tab" href="#availabilities" role="tab" aria-controls="availabilities" aria-selected="false">Availabilities</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="general-tab">
                    <div class="form-group">
                       <label for="name">name</label>
                       <input type="text" name="name" id="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                       value="{{ old('name') }}" />
                       @if($errors->has('name'))
                           <span class="invalid-feedback">{{ $errors->first('name') }}</span>
                       @endif
                   </div>

                   <div class="form-group">
                       <label for="unit_number">unit number</label>
                       <input type="text" name="unit_number" id="unit_number" class="form-control {{ $errors->has('unit_number') ? 'is-invalid' : '' }}"
                       value="{{ old('unit_number') }}" />
                       @if($errors->has('unit_number'))
                           <span class="invalid-feedback">{{ $errors->first('unit_number') }}</span>
                       @endif
                   </div>

                   <div class="form-group">
                       <label for="description">description</label>
                       <textarea name="description" id="description" cols="30" rows="10" class="form-control
                       {{ $errors->has('description') ? 'is-invalid' : '' }}">{{ old('description') }}</textarea>
                       @if($errors->has('description'))
                           <span class="invalid-feedback">{{ $errors->first('description') }}</span>
                       @endif
                   </div>

                   <div class="form-group">
                       <label for="bedrooms">bedrooms</label>
                       <select name="bedrooms" id="bedrooms" class="form-control {{ $errors->has('bedrooms') ? 'has-error' : '' }}">
                           <option value=""></option>
                           @for($i=1;$i<=20;$i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                           @endfor
                       </select>
                       @if($errors->has('bedrooms'))
                           <span class="invalid-feedback">{{ $errors->first('bedrooms') }}</span>
                       @endif
                   </div>

                   <div class="form-group">
                       <label for="bathrooms">bathrooms</label>
                       <select name="bathrooms" id="bathrooms" class="form-control {{ $errors->has('bathrooms') ? 'has-error' : '' }}">
                           <option value=""></option>
                           @for($i=1;$i<=20;$i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                           @endfor
                       </select>
                       @if($errors->has('bathrooms'))
                           <span class="invalid-feedback">{{ $errors->first('bathrooms') }}</span>
                       @endif
                   </div>

                   <div class="form-group">
                       <label for="sleeps">sleeps</label>
                       <select name="sleeps" id="sleeps" class="form-control {{ $errors->has('sleeps') ? 'has-error' : '' }}">
                           <option value=""></option>
                           @for($i=1;$i<=20;$i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                           @endfor
                       </select>
                       @if($errors->has('sleeps'))
                           <span class="invalid-feedback">{{ $errors->first('sleeps') }}</span>
                       @endif
                   </div>

                   <div class="form-group">
                       <label for="beds">beds</label>
                       <select name="beds" id="beds" class="form-control {{ $errors->has('beds') ? 'has-error' : '' }}">
                           <option value=""></option>
                           @for($i=1;$i<=20;$i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                           @endfor
                       </select>
                       @if($errors->has('beds'))
                           <span class="invalid-feedback">{{ $errors->first('beds') }}</span>
                       @endif
                   </div>

                   <div class="form-group">
                       <label for="property_type">property type</label>
                       <select name="property_type" id="property_type" class="form-control can-text {{ $errors->has('property_type') ? 'has-error' : '' }}">
                           <option value=""></option>
                           <option value="new">Add new</option>
                       </select>
                       @if($errors->has('property_type'))
                           <span class="invalid-feedback">{{ $errors->first('property_type') }}</span>
                       @endif
                   </div>

                   <div class="form-group">
                       <label for="square_feet">square feet</label>
                       <input type="text" name="square_feet" id="square_feet" class="form-control {{ $errors->has('square_feet') ? 'is-invalid' : '' }}"
                       value="{{ old('square_feet') }}" />
                       @if($errors->has('square_feet'))
                           <span class="invalid-feedback">{{ $errors->first('square_feet') }}</span>
                       @endif
                   </div>

                   <div class="form-check">
                       <input class="form-check-input" name="pets_allowed" type="checkbox" value="" id="pets_allowed">
                       <label class="form-check-label" for="pets_allowed">
                           pets allowed
                       </label>
                   </div>

                   <div class="form-group">
                       <label for="status">status</label>
                       <select name="status" id="status" class="form-control {{ $errors->has('status') ? 'has-error' : '' }}">
                           <option value=""></option>
                       </select>
                       @if($errors->has('status'))
                           <span class="invalid-feedback">{{ $errors->first('status') }}</span>
                       @endif
                   </div>
                </div>
                
                <div class="tab-pane fade" id="location" role="tabpanel" aria-labelledby="location-tab">
                    <div class="form-group">
                       <label for="complex_id">complex</label>
                       <select name="complex_id" id="complex_id" class="form-control {{ $errors->has('complex_id') ? 'has-error' : '' }}">
                           <option value=""></option>
                       </select>
                       @if($errors->has('complex_id'))
                           <span class="invalid-feedback">{{ $errors->first('complex_id') }}</span>
                       @endif
                   </div>
                   <div class="form-group">
                       <label for="address">address</label>
                       <input type="text" name="address" id="address" class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}"
                       value="{{ old('address') }}" />
                       @if($errors->has('address'))
                           <span class="invalid-feedback">{{ $errors->first('address') }}</span>
                       @endif
                   </div>

                   <div class="form-group">
                       <label for="address2">address 2</label>
                       <input type="text" name="address2" id="address2" class="form-control {{ $errors->has('address2') ? 'is-invalid' : '' }}"
                       value="{{ old('address2') }}" />
                       @if($errors->has('address2'))
                           <span class="invalid-feedback">{{ $errors->first('address2') }}</span>
                       @endif
                   </div>

                   <div class="form-group">
                       <label for="city">city</label>
                       <input type="text" name="city" id="city" class="form-control {{ $errors->has('city') ? 'is-invalid' : '' }}"
                       value="{{ old('city') }}" />
                       @if($errors->has('city'))
                           <span class="invalid-feedback">{{ $errors->first('city') }}</span>
                       @endif
                   </div>

                   <div class="form-group">
                       <label for="state">state</label>
                       <select name="state" id="state" class="form-control {{ $errors->has('state') ? 'has-error' : '' }}">
                           <option value=""></option>
                       </select>
                       @if($errors->has('state'))
                           <span class="invalid-feedback">{{ $errors->first('state') }}</span>
                       @endif
                   </div>

                   <div class="form-group">
                       <label for="zip">zip</label>
                       <input type="text" name="zip" id="zip" class="form-control {{ $errors->has('zip') ? 'is-invalid' : '' }}"
                       value="{{ old('zip') }}" />
                       @if($errors->has('zip'))
                           <span class="invalid-feedback">{{ $errors->first('zip') }}</span>
                       @endif
                   </div>
                </div>
                
                <div class="tab-pane fade" id="photos" role="tabpanel" aria-labelledby="photos-tab">
                    <div class="custom-file mt-4">
                        <input type="file" class="custom-file-input" id="peliculas" name="photos[]" onchange="preview_image();" multiple>
                        <label class="custom-file-label" for="photos">Choose files</label>
                    </div>
                    <!--<div class="card-deck mt-5" id="image_preview"></div>-->
                    <div class="row row-cols-1 row-cols-md-4 mt-5" id="image_preview"></div>
                </div>
                
                <div class="tab-pane fade" id="amenities" role="tabpanel" aria-labelledby="amenities-tab">
                    <div class="form-row" id="amenities-target"></div>
                </div>
                                
                <div class="tab-pane fade" id="availabilities" role="tabpanel" aria-labelledby="availabilities-tab">
                </div>
            </div>

               

               

           </form>
      </div>
        
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        

        
        <script>
            function preview_image() 
            {
                var total_file=document.getElementById("peliculas").files.length;
                for(var i=0;i<total_file;i++)
                {
                    $('#image_preview').append('<div class="col mb-4 mr-4"><div class="card" style="width: 18rem;"><img src="'+URL.createObjectURL(event.target.files[i])+'" class="card-img-top" alt="..." style="height:180px;"><div class="card-body"><a href="" data-id="'+i+'" class="btn btn-danger">Delete</a></div></div></div>')
//                    $('#image_preview').append("<img src='"+URL.createObjectURL(event.target.files[i])+"'><br>");
                }
            }
            
            var amenities = {
                'Balcony' : '',
                'Patio' : '',
                'Grill' : '',
                'Hot Tub' : '',
                'Jacuzzi' : '',
                'Sauna' : '',
                'WiFi' : '',
                'Full Kitchen' : '',
                'Sleeper Sofa' : '',
                'Garden Tub' : '',
                'Walk-in Shower' : '',
                'Jacuzzi Tub' : ''
            }
            
            $(function(){
                $('.can-text').on('change', function(){
                    var el = $(this)
                    if(el.val() == 'new')
                    {
                        var newEl = $('<input>').attr({
                            name: el.name,
                            id: el.id,
                            class: 'form-control'
                        })
                        el.replaceWith(newEl)
                        $(newEl).focus()
                    }
                })
                
                $.each(amenities, function(e, v){
                    var cont = $('<div />', {class: 'col-2 mb-2'})
                    var formCheck = $('<div />', {class: 'form-check'})
                    $('<input />', {type: 'checkbox', class: 'form-check-input', name: 'amenities[]', id: 'amenities-'+e, value: e}).appendTo(formCheck)
                    $('<label />', {class: 'form-check-label', for: 'amenities-'+e}).text(e).appendTo(formCheck)
                    formCheck.appendTo(cont)
                    cont.appendTo($('#amenities-target'))
                })
            })
            
            $('#myTab').tab().bind('change', function (e) {
                    $(this).next().hide().slideDown()
            });
            
        </script>
    </body>
</html>