@if($componentGroups->count() > 0)
@foreach($componentGroups as $componentGroup)
@if($componentGroup->enabled_components->count() > 0)
<ul class="list-group components">
    <li class="list-group-item group-name">
    @if(!$componentGroup->private)
        <i class="{{ $componentGroup->collapse_class }} group-toggle"></i>
    @endif
        <span class="component-group-name">{{ $componentGroup->name }}</span>
    </li>
    @if(!$componentGroup->private)
    <div class="group-items {{ $componentGroup->is_collapsed ? "hide" : null }}">
        @foreach($componentGroup->enabled_components()->get() as $component)
        @include('dashboard.partials.component', compact($component))
        @endforeach
    </div>
    @endif
</ul>
@endif
@endforeach
@endif

@if($ungroupedComponents->count() > 0)
<ul class="list-group components">
    @if($componentGroups->count() > 0)
    <li class="list-group-item group-name">
        <span class="component-group-other">{{ trans('cachet.components.group.other') }}</span>
    </li>
    @endif
    @foreach($ungroupedComponents as $component)
    @include('dashboard.partials.component', compact($component))
    @endforeach
</ul>
@endif
