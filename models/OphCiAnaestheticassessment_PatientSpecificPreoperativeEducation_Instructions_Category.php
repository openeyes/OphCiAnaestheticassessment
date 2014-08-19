<?php

/**
 * This is the model class for table "ophcianassessment_speced_instruc_cat".
 *
 * The followings are the available columns in table 'ophcianassessment_speced_instruc_cat':
 * @property string $id
 * @property string $name
 * @property integer $display_order
 * @property string $last_modified_user_id
 * @property string $last_modified_date
 * @property string $created_user_id
 * @property string $created_date
 *
 * The followings are the available model relations:
 * @property User $user
 * @property User $usermodified
 */
class OphCiAnaestheticassessment_PatientSpecificPreoperativeEducation_Instructions_Category extends BaseActiveRecordVersioned
{

	const SELECTION_ORDER = 'display_order';
	const SELECTION_LABEL_FIELD = 'name';

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ophcianassessment_speced_instruc_cat';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('name', 'safe'),
			array('name', 'required'),
			array('id, name', 'safe', 'on' => 'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'user' => array(self::BELONGS_TO, 'User', 'created_user_id'),
			'usermodified' => array(self::BELONGS_TO, 'User', 'last_modified_user_id'),
			'instructions' => array(self::HAS_MANY, 'OphCiAnaestheticassessment_PatientSpecificPreoperativeEducation_Instructions', 'category_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'display_order' => 'Display Order'
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('active', 1);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return OphCiAnaestheticassessment_PatientSpecificPreoperativeEducation_Instructions_Category the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
