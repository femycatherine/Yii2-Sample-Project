<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "students".
 *
 * @property integer $id
 * @property string $grade
 * @property integer $class_id
 * @property string $student_name
 * @property string $address
 * @property string $phone_home
 * @property string $phone_cell
 * @property string $email
 * @property string $contact_name1
 * @property string $contact_phone1
 * @property string $contact_relation1
 * @property string $contact_name2
 * @property string $contact_phone2
 * @property string $contact_relation2
 * @property integer $new_student
 * @property string $date_of_birth
 * @property string $gender
 * @property string $date_of_baptism
 * @property string $parish_where_baptized
 * @property string $name_of_previous_school
 * @property string $father_family_name
 * @property string $father_name
 * @property string $father_religion_rite
 * @property string $father_place_of_birth
 * @property string $father_parish_diocess
 * @property string $mother_family_name
 * @property string $mother_name
 * @property string $mother_religion_rite
 * @property string $mother_place_of_birth
 * @property string $mother_parish_diocess
 * @property string $date
 * @property integer $sign
 * @property string $message_info
 * @property string $baptism_doc_location
 * @property string $other_data
 * @property string $person_who_is_added
 * @property string $sign_name
 * @property string $safe_enviroment_authorization
 * @property integer $baptism_previously_uploaded
 */
class Students extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'students';
    }

    /**
     * @inheritdoc
     */
 public static function primaryKey()
    {
        return ['id'];
    }
    /**
     * Define rules for validation
     */
    public function rules()
    {
        return [
            [['id', 'grade', 'student_name'], 'required']
        ];
    }
}
