<?php

namespace App\Models\Transaction\Traits\Attribute;

/**
 * Trait OrderAttribute.
 */
trait OrderAttribute
{
    
    /**
     * @return string
     */
    public function getFormatAmountAttribute(){
        return "P" . number_format($this->total_amount, 2,".",",");
    }
    
    /**
     * @return string
     */
    public function getShowButtonAttribute()
    {
        return '<a href="'.route('admin.transaction.order.show', $this).'" data-toggle="tooltip" data-placement="top" title="'.__('buttons.general.crud.view').'" class="btn btn-info"><i class="fas fa-eye"></i></a>';
    }

    /**
     * @return string
     */
    public function getEditButtonAttribute()
    {
        return '<a href="'.route('admin.transaction.order.edit', $this).'" class="btn btn-primary"><i class="fas fa-edit" data-toggle="tooltip" data-placement="top" title="'.__('buttons.general.crud.edit').'"></i></a>';
    }

    /**
     * @return string
     */
    public function getDeleteButtonAttribute()
    {
        return '<a href="'.route('admin.transaction.order.destroy', $this).'"
			 data-method="delete"
			 data-trans-button-cancel="'.__('buttons.general.cancel').'"
			 data-trans-button-confirm="'.__('buttons.general.crud.delete').'"
			 data-trans-title="'.__('strings.backend.general.are_you_sure').'"
			 class="btn btn-danger"><i class="fas fa-trash" data-toggle="tooltip" data-placement="top" title="'.__('buttons.general.crud.delete').'"></i></a> ';
    }

    public function getStatusButtonAttribute(){
        switch($this->status){
            case 0 : 
                return '<a href="'.route('admin.transaction.order.mark', [$this, 1]).'" class="btn btn-success"><i class="fas fa-check" data-toggle="tooltip" data-placement="top" title="'.__('buttons.backend.access.users.activate').'"></i></a>';
            case 1 :
                return '<a href="'.route('admin.transaction.order.mark', [$this, 0]).'" class="btn btn-warning"><i class="fas fa-times" data-toggle="tooltip" data-placement="top" title="'.__('buttons.backend.access.users.deactivate').'"></i></a>';
            default :
                return '';
        }
        
    }

    public function getSelectButtonAttribute(){
        return '<a href="'. route('frontend.auth.register', ["branch" => $this]) .'" class="btn btn-info">Select</a>';
    }

    /**
     * @return string
     */
    public function getActionButtonsAttribute()
    {

        return '<div class="btn-group btn-group-sm" role="group" aria-label="'.__('labels.backend.access.users.user_actions').'">
			  '.$this->show_button.'
			  '.$this->edit_button.'
			  '.$this->delete_button.'
			  '.$this->status_button.'
			</div>';
    }

    /**
     * @return string
     */
    public function getStatusLabelAttribute(){
        return $this->status == 1 ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-danger">Not Active</span>';
    }
    
    /**
     * @return string
     */
    public function getStatusPaymentAttribute(){
        return $this->payment_status == 1 ? '<span class="badge badge-success">Paid</span>' : '<span class="badge badge-danger">Not Paid</span>';
    }
    
}
