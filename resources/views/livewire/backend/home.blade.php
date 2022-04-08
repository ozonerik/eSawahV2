<div class="row">
  <!-- left section -->
  <section class="col connectedSortable">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Dashboard</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
        </div>
        <div class="card-body">
            <button class="btn btn-primary" wire:click="increment">+</button>
            <h1>{{ $count }}</h1>
        </div>
        <div class="card-footer">
          Footer
        </div>
    </div>
  </section>
</div>