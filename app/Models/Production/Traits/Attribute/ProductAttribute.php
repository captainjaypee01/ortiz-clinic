<?php

namespace App\Models\Production\Traits\Attribute;

/**
 * Trait ProductAttribute.
 */
trait ProductAttribute
{
    public function getFormatPriceAttribute(){
        return "P" . number_format($this->price, 2,".",",");
    } 
    
    public function getFormatImageLocationAttribute(){
        return $this->image_location ? url('uploads') . '/' . $this->image_location : asset('img/frontend/ortiz-clinic-logo.png');
        return $this->image_location ? 'https://storage.cloud.google.com/ortiz_clinic/' . $this->image_location : asset('img/frontend/ortiz-clinic-logo.png');
    }

    /**
     * @return string
     */
    public function getShowButtonAttribute()
    {
        return '<a href="'.route('admin.production.product.show', $this).'" data-toggle="tooltip" data-placement="top" title="'.__('buttons.general.crud.view').'" class="btn btn-info"><i class="fas fa-eye"></i></a>';
    }

    /**
     * @return string
     */
    public function getEditButtonAttribute()
    {
        return '<a href="'.route('admin.production.product.edit', $this).'" class="btn btn-primary"><i class="fas fa-edit" data-toggle="tooltip" data-placement="top" title="'.__('buttons.general.crud.edit').'"></i></a>';
    }

    public function getQuantityButtonAttribute(){
        return '<button class="dropdown-item btn-quantity" data-toggle="modal" data-target="#add-quantity-modal" data-id="'. $this->id .'">Add Quantity</button>';
    }

    /**
     * @return string
     */
    public function getDeleteButtonAttribute()
    {
        return '<a href="'.route('admin.production.product.destroy', $this).'"
			 data-method="delete"
			 data-trans-button-cancel="'.__('buttons.general.cancel').'"
			 data-trans-button-confirm="'.__('buttons.general.crud.delete').'"
			 data-trans-title="'.__('strings.backend.general.are_you_sure').'"
			 class="dropdown-item">Delete</a> ';
    }

    public function getStatusButtonAttribute(){
        switch($this->status){
            case 0 : 
                return '<a href="'.route('admin.production.product.mark', [$this, 1]).'" class="dropdown-item bg-success">Activate</a>';
            case 1 :
                return '<a href="'.route('admin.production.product.mark', [$this, 0]).'" class="dropdown-item bg-warning">Deactivate</a>';
            default :
                return '';
        }
        
    }
    

    /**
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        return '
    	<div class="btn-group" role="group" aria-label="'.__('labels.backend.access.users.user_actions').'">
		  '.$this->show_button.'
		  '.$this->edit_button.'

		  <div class="btn-group btn-group-sm" role="group">
			<button id="userActions" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			  '.__('labels.general.more').'
			</button>
			<div class="dropdown-menu" aria-labelledby="userActions">
            '.$this->quantity_button.'
            '.$this->delete_button.'
            '.$this->status_button.'
			</div>
		  </div>
		</div>';

        // return '<div class="btn-group btn-group-sm" role="group" aria-label="'.__('labels.backend.access.users.user_actions').'">
		// 	  '.$this->show_button.'
		// 	  '.$this->edit_button.'
		// 	  '.$this->delete_button.'
		// 	  '.$this->status_button.'
		// 	</div>';
    }

    /**
     * @return string
     */
    public function getStatusLabelAttribute(){
        return $this->quantity > 0 ? '<span class="badge badge-success">Available</span>' : '<span class="badge badge-danger">Not Available</span>';
    }
    
    /**
     * @return string
     */
    // public function getStatusLabelAttribute(){
    //     return $this->status == 1 ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-danger">Not Active</span>';
    // }
}
