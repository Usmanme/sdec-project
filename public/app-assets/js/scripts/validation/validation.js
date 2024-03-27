function Validation(name,description,color_id,type_id,tone_id,style_id,replacement_cycle_id,collection_id,price,price_by,features,lens_material,base_curve,diameter,oxygen_permeability,center_thickness,power)
{
    if($(name).val()=='' || $(name).val()==null)
        toastr.error('Name Field is Required.');
    else if($(description).val()=='' || $(description).val()==null)
        toastr.error('Description Field is Required.');
    else if($(color_id).val()=='' || $(color_id).val()==null)
        toastr.error('Color Field is Required.');
    else if($(type_id).val()=='' || $(type_id).val()==null)
        toastr.error('Type Field is Required.');
    else if($(tone_id).val()=='' || $(tone_id).val()==null)
        toastr.error('Tone Field is Required.');
    else if($(style_id).val()=='' || $(style_id).val()==null)
        toastr.error('Style Field is Required.');
    else if($(replacement_cycle_id).val()=='' || $(replacement_cycle_id).val()==null)
        toastr.error('Replacement Cycle Field is Required.');
    else if($(collection_id).val()=='' || $(collection_id).val()==null)
        toastr.error('Collection Field is Required.');
    else if($(price).val()=='' || $(price).val()==null || $(price).val()==0)
        toastr.error('Price Field is Required.');
    else if($(price_by).val()=='' || $(price_by).val()==null)
        toastr.error('Price By Field is Required.');
    else if($(features).val()=='' || $(features).val()==null)
        toastr.error('Feature Field is Required.')
    else if($(lens_material).val()=='' || $(lens_material).val()==null)
        toastr.error('Lens Material Field is Required.')
    else if($(base_curve).val()=='' || $(base_curve).val()==null)
        toastr.error('Base Curve Field is Required.')
    else if($(diameter).val()=='' || $(diameter).val()==null)
        toastr.error('Diameter Field is Required.')
    else if($(oxygen_permeability).val()=='' || $(oxygen_permeability).val()==null)
        toastr.error('Oxygen Permeability Field is Required.')
    else if($(center_thickness).val()=='' || $(center_thickness).val()==null)
        toastr.error('Center Thickness Field is Required.')
    // else if($(power).val()=='' || $(power).val()==null)
    //     toastr.error('Power Field is Required.')
    else
        toastr.error('Power Field is Required.')
        // toastr.error('Something.')

}