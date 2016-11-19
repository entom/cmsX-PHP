<div class="row">
    <div class="col s2">
        <select id="ChangePaginationLimit" name="ChangePaginationLimit" class="change-pagination-limit" data-controller="{{$controller}}">
            <option disabled>Wybierz ilość elementów</option>
            @for($i=10; $i<=50; $i+=10)
                <option value="{{$i}}">{{$i}}</option>
            @endfor
            <option value="100">100</option>
        </select>
    </div>
    <div class="col s10 right-align">
        <div class="pagination-wrapper"> {!! $items->render() !!} </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        @if(isset($paginationLimit))
            $('#ChangePaginationLimit').val({{$paginationLimit}});
            $('#ChangePaginationLimit').material_select();
        @endif
    });
</script>