<div class="input-group mb-4">
<span class="input-group-btn ml-1">

                        	<button type="button" class="quantity-right-plus btn" data-type="plus" data-field="" wire:click="decrement">
                             <i class="icon-minus2"></i>

                         </button>
                     	</span>
                    			

                     	<input type="number" id="quantity" name="quantity" class="form-control input-number" value="{{$count}}" min="1" required>
                     	<span class="input-group-btn ml-1">

                        	<button type="button" class="quantity-right-plus btn" data-type="plus" data-field="" wire:click="increment">
                             <i class="icon-plus2"></i>

                         </button>
                     	</span>
</div>

 