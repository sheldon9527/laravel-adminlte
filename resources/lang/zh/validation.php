<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | such as the size rules. Feel free to tweak each of these messages.
    |
    */

    'accepted' => ':attribute 必须接受。',
    'active_url' => ':attribute 不是一个有效的网址。',
    'after' => ':attribute 必须是一个在 :date 之后的日期。',
    'alpha' => ':attribute 只能由字母组成。',
    'alpha_dash' => ':attribute 只能由字母、数字和斜杠组成。',
    'alpha_num' => ':attribute 只能由字母和数字组成。',
    'array' => ':attribute 必须是一个数组。',
    'before' => ':attribute 必须是一个在 :date 之前的日期。',
    'between' => [
        'numeric' => ':attribute 必须介于 :min - :max 之间。',
        'file' => ':attribute 必须介于 :min - :max kb 之间。',
        'string' => ':attribute 必须介于 :min - :max 个字符之间。',
        'array' => ':attribute 必须只有 :min - :max 个单元。',
    ],
    'boolean' => ':attribute 必须为布尔值。',
    'confirmed' => ':attribute 两次输入不一致。',
    'date' => ':attribute 不是一个有效的日期。',
    'date_format' => ':attribute 的格式必须为 :format。',
    'different' => ':attribute 和 :other 必须不同。',
    'digits' => ':attribute 必须是 :digits 位的数字。',
    'digits_between' => ':attribute 必须是介于 :min 和 :max 位的数字。',
    'email' => ':attribute 不是一个合法的邮箱。',
    'exists' => ':attribute 不存在。',
    'filled' => ':attribute 不能为空。',
    'image' => ':attribute 必须是图片。',
    'in' => '已选的属性 :attribute 非法。',
    'integer' => ':attribute 必须是整数。',
    'ip' => ':attribute 必须是有效的 IP 地址。',
    'max' => [
        'numeric' => ':attribute 不能大于 :max。',
        'file' => ':attribute 不能大于 :max kb。',
        'string' => ':attribute 不能大于 :max 个字符。',
        'array' => ':attribute 最多只有 :max 个单元。',
    ],
    'mimes' => ':attribute 必须是一个 :values 类型的文件。',
    'min' => [
        'numeric' => ':attribute 必须大于等于 :min。',
        'file' => ':attribute 大小不能小于 :min kb。',
        'string' => ':attribute 至少为 :min 个字符。',
        'array' => ':attribute 至少有 :min 个单元。',
    ],
    'not_in' => '已选的属性 :attribute 非法。',
    'numeric' => ':attribute 必须是一个数字。',
    'regex' => ':attribute 格式不正确。',
    'required' => ':attribute 不能为空。',
    'required_if' => '当 :other 为 :value 时 :attribute 不能为空。',
    'required_with' => '当 :values 存在时 :attribute 不能为空。',
    'required_with_all' => '当 :values 存在时 :attribute 不能为空。',
    'required_without' => '当 :values 不存在时 :attribute 不能为空。',
    'required_without_all' => '当 :values 都不存在时 :attribute 不能为空。',
    'same' => ':attribute 和 :other 必须相同。',
    'size' => [
        'numeric' => ':attribute 大小必须为 :size。',
        'file' => ':attribute 大小必须为 :size kb。',
        'string' => ':attribute 必须是 :size 个字符。',
        'array' => ':attribute 必须为 :size 个单元。',
    ],
    'string' => ':attribute 必须是一个字符串。',
    'timezone' => ':attribute 必须是一个合法的时区值。',
    'unique' => ':attribute 已经存在。',
    'url' => ':attribute 格式不正确。',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [
        'verify_code' => '验证码',
        'username' => '用户名',
        'password' => '密码',
        'password_confirmation' => '确认密码',
        'user_type' => '用户类型',
        'old_password' => '原始密码',
        'title' => '标题',
        'description' => '描述',
        'cover_picture_url' => '图片地址',
        'weight' => '排序',
        'contact' => '联系人',
        'contact_cellphone' => '联系电话',
        'contact_email' => '联系邮箱',
        'address' => '地址',
        'country_region_id' => '国家',
        'province_region_id' => '省',
        'city_region_id' => '城市',
        'postcode' => '邮编',
        'note' => '备注',
        'start_time' => '开始时间',
        'end_time' => '结束时间',
        'first_name' => '名',
        'last_name' => '姓',
        'avatar' => '头像',
        'avatar_url' => '头像地址',
        'gender' => '性别',
        'position' => '职业',
        'factory_name' => '工厂名称',
        'email' => '邮箱',
        'location' => [
            'detail' => '详细地址',
            'country_region_id' => '国家',
            'province_region_id' => '省',
            'city_region_id' => '城市',
        ],
        'educations' => '教育经历',
        'careers' => '工作经历',
        'brands' => '品牌',
        'category_types' => '设计类型',
        'works' => '作品',
        'description' => '描述',
        'attachment_ids' => '附件',
        'name' => '名称',
        'price' => '价格',
        'duration' => '所需天数',
        'custom_category' => '自定义分类',
        'type' => '类型',
        'service_id' => '服务',
        'service_type' => '作品所属季节',
        'operate' => '订单的操作',
        'position_id' => '职位',
        'order_id' => '订单ID',
        'order_type' => '订单类型',
        'pay_mode' => '付款方式',
        'address_id' => '地址',
        'category_id' => '类别',
        'estimated_production_no' => '预计生产数量',
        'style_no' => '款号',
        'maker_ids' => '制造商',
        'track_name' => '物流公司',
        'track_number' => '物流单号',
        'production_price' => '生产单价',
        'production_duration' => '生产时间',
        'sample_price' => '打样单价',
        'sample_duration' => '打样时间',
        'contact_note' => '制造商备注',
        'owner_note' => '拥有者备注',
        'attachments' => '附件',
        'inquiry_id' => '询价单',
        'production_no' => '生产数量',
        'is_normal_transport' => '是否普通快递',
        'invoice' => '发票',
        'pack_order' => '装箱单',
        'production_order_id' => '生产订单',
        'amount' => '金额',
        'account_no' => '帐号',
        'bank_name' => '银行名称',
        'account_name' => '申请人',
        'show_amount' => '是否显示金额',
        'orderby' => '排序',
        'inquiry_order_id' => '询价单',
        'sample_order_id' => '打样单',
        'production_standards'=>'产品标准',
        'transport_method'=>'运输方式',
        'weixin'=>'微信',
        'cellphone'=>'手机',
        'want_do'=>'希望进行',

    ],
];
