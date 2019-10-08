<?php

namespace App\Models\Record\Traits\Attribute;

/**
 * Trait RoomAttribute.
 */
trait RoomAttribute
{
    
    /**
     * @return string
     */
    public function getFullAddressAttribute()
    {
        return $this->address_line_1 . ', ' . $this->barangay . ', ' . $this->city . ', ' . $this->province . ', ' . $this->country;
    }
    
    /**
     * @return string
     */
    public function getSubAddressAttribute()
    {
        return $this->address_line_1 . ', ' . $this->barangay . ', ' . $this->city;
    }

    /**
     * @return string
     */
    public function getShowButtonAttribute()
    {
        return '<a href="'.route('admin.record.room.show', $this).'" data-toggle="tooltip" data-placement="top" title="'.__('buttons.general.crud.view').'" class="btn btn-info"><i class="fas fa-eye"></i></a>';
    }

    /**
     * @return string
     */
    public function getEditButtonAttribute()
    {
        return '<a href="'.route('admin.record.room.edit', $this).'" class="btn btn-primary"><i class="fas fa-edit" data-toggle="tooltip" data-placement="top" title="'.__('buttons.general.crud.edit').'"></i></a>';
    }

    /**
     * @return string
     */
    public function getDeleteButtonAttribute()
    {
        return '<a href="'.route('admin.record.room.destroy', $this).'"
			 data-method="delete"
			 data-trans-button-cancel="'.__('buttons.general.cancel').'"
			 data-trans-button-confirm="'.__('buttons.general.crud.delete').'"
			 data-trans-title="'.__('strings.backend.general.are_you_sure').'"
			 class="btn btn-danger"><i class="fas fa-trash" data-toggle="tooltip" data-placement="top" title="'.__('buttons.general.crud.delete').'"></i></a> ';
    }

    public function getStatusButtonAttribute(){
        switch($this->status){
            case 0 : 
                return '<a href="'.route('admin.record.room.mark', [$this, 1]).'" class="btn btn-success"><i class="fas fa-check" data-toggle="tooltip" data-placement="top" title="'.__('buttons.backend.access.users.activate').'"></i></a>';
            case 1 :
                return '<a href="'.route('admin.record.room.mark', [$this, 0]).'" class="btn btn-warning"><i class="fas fa-times" data-toggle="tooltip" data-placement="top" title="'.__('buttons.backend.access.users.deactivate').'"></i></a>';
            default :
                return '';
        }
        
    }

    public function getSelectButtonAttribute(){
        return '<a href="'. route('frontend.auth.register', ["room" => $this]) .'" class="btn btn-info">Select</a>';
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
    
}
