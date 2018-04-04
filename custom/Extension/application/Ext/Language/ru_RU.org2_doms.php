<?php 
$app_list_strings['salutation_dom'] = array (
	'' => '',
	'deacon' => 'диакон',
	'hierodeacon' => 'иеродиакон',
	'monk' => 'монах',
	'nun' => 'монахиня',
	'priest' => 'иерей',
	'archpriest' => 'протоиерей',
	'hieromonk' => 'иеромонах',
	'hegumen' => 'игумен',
	'archimandrite' => 'архимандрит',
	'bishop' => 'епископ',
	'archbishop' => 'архиепископ',
	'metropolitan' => 'митрополит',
	'patriarch' => 'патриарх'
);

$app_list_strings['federal_districts_dom'] = array (
	'' => '',
	'ural' => 'УрФО',
	'siberia' => 'СФО'
);

$app_list_strings['metropolises_dom'] = array (
	'' => '',
	/* СФО */
	'abakansk' => 'Абаканская епархия',
	'altay' => 'Алтайская',
	'byriatiya' => 'Бурятская',
	'zabaykalsk' => 'Забайкальская',
	'kemerovo' =>'Кемеровская',
	'krasnoyarsk' => 'Красноярская',
	'kyzyl' => 'Кызыльская епархия',
	'novosibirsk' => 'Новосибирская',
	'omsk' => 'Омская',
	'tomsk' => 'Томская',
	'irkutsk' => 'Иркутская',
	/* УФО */
	'ekaterinburg' => 'Екатеринбургская',
	'kurgan' => 'Курганская',
	'tobolsk' => 'Тобольская',
	'hantymansyisk' => 'Ханты-Мансийская',
	'chelabinsk' => 'Челябинская',
);

$app_list_strings['metropolises_by_feddistricts_dom'] = array (
	'' => [],
	'siberia' => [
	  '' => '',
	  'abakansk' => 'Абаканская епархия',
  	  'altay' => 'Алтайская',
	  'byriatiya' => 'Бурятская',
	  'zabaykalsk' => 'Забайкальская',
  	  'irkutsk' => 'Иркутская',
	  'kemerovo' =>'Кемеровская',
	  'krasnoyarsk' => 'Красноярская',
	  'kyzyl' => 'Кызыльская епархия',
  	  'novosibirsk' => 'Новосибирская',
  	  'omsk' => 'Омская',
	  'tomsk' => 'Томская',
        ],
	'ural' => [  
	  '' => '',
	  'ekaterinburg' => 'Екатеринбургская',
	  'kurgan' => 'Курганская',
	  'tobolsk' => 'Тобольская',
	  'hantymansyisk' => 'Ханты-Мансийская',
	  'chelabinsk' => 'Челябинская',
        ],
);

$app_list_strings['dioceses_dom'] = array (
	'' => '',
	/* СФО */
	/* Кемеровская */
	'kemerovo' =>'Кемеровская',
	'novokuznetsk' => 'Новокузнецкая',
	'mariinsk' => 'Мариинская',
	/* Новосибирская */
	'novosibirsk' => 'Новосибирская',
	'iskitimsk' => 'Искитимская',
	'kainsk' => 'Каинская',
	/* Томская */
	'tomsk' => 'Томская',
	'kolpashevsk' => 'Колпашевская',
	/* Иркутская */
	'irkutsk' => 'Иркутская',
	'bratsk' => 'Братская',
	'sayansk' => 'Саянская',
	/* Алтайская */
	'rubtsovsk' => 'Рубцовская',
	'slavgorod' => 'Славгородская',
	'byisk' => 'Бийская',
	'barnaul' => 'Барнаульская',
	'gornoaltaysk' => 'Горноалтайская',
	/* Омская */
	'omsk' => 'Омская',
	'kalachinsk' => 'Калачинская',
	'tara' => 'Тарская',
	'isilkulsk' => 'Иссилькульская',
	/* Красноярская */
	'krasnoyarsk' => 'Красноярская',
	'kainsk' => 'Канская',
	'eniseysk' => 'Енисейская',
	'norilsk' => 'Норильская',
	/* Забайкальская */
	'zabaykalsk' => 'Забайкальская',
	/* Бурятская */
	'byriatiya' => 'Бурятская',
	'severobajkalskaya' => 'Северобайкальская',
	/* прочие */
	'abakansk' => 'Абаканская',
	'kyzyl' => 'Кызыльская',

	/* УФО */
	/* Екатеринбургская */
	'ekaterinburg' => 'Екатеринбургская',
	'kamensk' => 'Каменская',
	'negnetagil' => 'Нижнетагильская',
	'seversk' => 'Серовская',
	/* Курганская */
	'kurgan' => 'Курганская',
	'shadrinsk' => 'Шадринск',
	/* Тобольская */
	'tobolsk' => 'Тобольская',
	'ishim' => 'Ишимская',
	/* Ханты-Мансийская */
	'hantymansyisk' => 'Ханты-Мансийская',
	'ugorsk' => 'Югорская',
	/* Челябинская */
	'chelabinsk' => 'Челябинская',
	'magnitogorsk' => ' Магнитогорская',
	'troitsk' => 'Троицкая',
	'zlatoust' => 'Златоустовская',
);

$app_list_strings['dioces_by_metropolises_dom'] = array (
	'' => [],
	/* СФО */
	'kemerovo' => [
	    '' => '',
  	    'kemerovo' =>'Кемеровская',
	    'novokuznetsk' => 'Новокузнецкая',
	    'mariinsk' => 'Мариинская',
        ],
	'novosibirsk' => [
	    '' => '',
	    'novosibirsk' => 'Новосибирская',
	    'iskitimsk' => 'Искитимская',
	    'kainsk' => 'Каинская',
	],
	'tomsk' => [
	    '' => '',
	    'tomsk' => 'Томская',
	    'kolpashevsk' => 'Колпашевская',
        ],   
	'irkutsk' => [
	    '' => '',
	    'irkutsk' => 'Иркутская',
	    'bratsk' => 'Братская',
	    'sayansk' => 'Саянская',
        ],
  	'altay' => [
	    '' => '',
	    'rubtsovsk' => 'Рубцовская',
	    'slavgorod' => 'Славгородская',
	    'byisk' => 'Бийская',
	    'barnaul' => 'Барнаульская',
	    'gornoaltaysk' => 'Горноалтайская',
	],
	'omsk' => [
	    '' => '',
	    'omsk' => 'Омская',
	    'kalachinsk' => 'Калачинская',
	    'tara' => 'Тарская',
	    'isilkulsk' => 'Иссилькульская',
        ],
	'krasnoyarsk' => [
	    '' => '',
	    'krasnoyarsk' => 'Красноярская',
	    'kainsk' => 'Канская',
	    'eniseysk' => 'Енисейская',
	    'norilsk' => 'Норильская',
	],
	'zabaykalsk' => [
	    '' => '',
	    'zabaykalsk' => 'Забайкальская',
	],
	'byriatiya' => [
	    '' => '',
	    'byriatiya' => 'Бурятская',
	    'severobajkalskaya' => 'Северобайкальская',
	],
	'abakansk' => [
	    '' => '',
	    'abakansk' => 'Абаканская',
	],
	'kyzyl' => [
	    '' => '',
	    'kyzyl' => 'Кызыльская',
	],
	/* УФО */
	'ekaterinburg' => [
	    '' => '',
	    'ekaterinburg' => 'Екатеринбургская',
	    'kamensk' => 'Каменская',
	    'negnetagil' => 'Нижнетагильская',
	    'seversk' => 'Серовская',
	],
	'kurgan' => [
	    '' => '',
	    'kurgan' => 'Курганская',
	    'shadrinsk' => 'Шадринск',
	],
	'tobolsk' => [
	    '' => '',
	    'tobolsk' => 'Тобольская',
	    'ishim' => 'Ишимская',
	],
	'hantymansyisk' => [
	    '' => '',
	    'hantymansyisk' => 'Ханты-Мансийская',
	    'ugorsk' => 'Югорская',
	],
	'chelabinsk' => [
	    '' => '',
	    'chelabinsk' => 'Челябинская',
	    'magnitogorsk' => ' Магнитогорская',
	    'troitsk' => 'Троицкая',
	    'zlatoust' => 'Златоустовская',
	],
);

