@props(['label','icon','link'])
<?php
    $path = trim(str_replace(url('/'),'',$link),'/');
    $wildchar = $path =='admin' ? '' : '*';
    $is = request()->is($path.$wildchar);
?>

<li class="nav-item">
    <a href="<?= $link ?>" class="nav-link{{ $is ? ' active':''}}">
      <img src="{{ $icon }}" class="" width="28px">
      <p>{{ $label }}</p>
    </a>
  </li>
