<link href="{{ '/styles/main.css' }}" rel="stylesheet">
<canvas class="result"></canvas>
<input type="hidden" id="file3dar" value="{{ asset($product->file) }}">
<script type="importmap">
  {
    "imports": {
      "three": "/vendor/three/src/Three.js"
    }
  }
</script>
<script type="module" src="{{ '/js/arview/index.js' }}"></script>