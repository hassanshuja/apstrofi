@if(!empty($images))
    <div class="kt-section">
        <div class="kt-section__content">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Images</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php $i = 0; ?>
                @foreach($images as $key=>$val)

                    <tr id="tr_{!! $i+1 !!}">
                        <th scope="row">{!! $i+1 !!}</th>
                        <td>
                            <img class="kt-widget7__img" src="{!! $val != '' ? url($val) : '' !!}" alt="">
                        </td>
                        <td><a data-toggle="confirmation" data-placement="top" href="javascript:void(0);" data-title="delete Images"    data-action="{!!  route('admin.blog.delete-image',$key)!!}" data-id="{!! $i+1 !!}" class="btn btn-sm btn-label-danger btn-bold delete-images">Remove</a></td>
                    </tr>
                    <?php $i++; ?>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endif