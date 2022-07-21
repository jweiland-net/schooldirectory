#
# Table structure for table 'tx_schooldirectory_domain_model_school'
#
CREATE TABLE tx_schooldirectory_domain_model_school (
	title varchar(255) DEFAULT '' NOT NULL,
	path_segment varchar(2048) DEFAULT '' NOT NULL,
	leader varchar(255) DEFAULT '' NOT NULL,
	street varchar(255) DEFAULT '' NOT NULL,
	house_number varchar(255) DEFAULT '' NOT NULL,
	zip varchar(255) DEFAULT '' NOT NULL,
	city varchar(255) DEFAULT '' NOT NULL,
	telephone varchar(255) DEFAULT '' NOT NULL,
	telephone_alternative varchar(255) DEFAULT '' NOT NULL,
	fax varchar(255) DEFAULT '' NOT NULL,
	email varchar(255) DEFAULT '' NOT NULL,
	email_alternative varchar(255) DEFAULT '' NOT NULL,
	website varchar(255) DEFAULT '' NOT NULL,
	logo int(11) DEFAULT '0' NOT NULL,
	images int(11) DEFAULT '0' NOT NULL,
	amount_of_students varchar(255) DEFAULT '' NOT NULL,
	profile_title varchar(255) DEFAULT '' NOT NULL,
	school_way_plan varchar(255) DEFAULT '' NOT NULL,
	notes text NOT NULL,
	additional_informations text NOT NULL,
	facebook varchar(255) DEFAULT '' NOT NULL,
	twitter varchar(255) DEFAULT '' NOT NULL,
	instagram varchar(255) DEFAULT '' NOT NULL,
	holder int(11) unsigned DEFAULT '0',
	types int(11) unsigned DEFAULT '0' NOT NULL,
	profile_contents int(11) unsigned DEFAULT '0' NOT NULL,
	care_forms int(11) unsigned DEFAULT '0' NOT NULL,
	school_district int(11) unsigned DEFAULT '0',
	district int(11) unsigned DEFAULT '0',
	category int(11) unsigned DEFAULT '0'
);

#
# Table structure for table 'tx_schooldirectory_domain_model_holder'
#
CREATE TABLE tx_schooldirectory_domain_model_holder (
	title varchar(255) DEFAULT '' NOT NULL,
	logo int(11) DEFAULT '0' NOT NULL,
	website varchar(255) DEFAULT '' NOT NULL,
);

#
# Table structure for table 'tx_schooldirectory_domain_model_type'
#
CREATE TABLE tx_schooldirectory_domain_model_type (
	title varchar(255) DEFAULT '' NOT NULL,
	description text NOT NULL,
);

#
# Table structure for table 'tx_schooldirectory_domain_model_profilecontent'
#
CREATE TABLE tx_schooldirectory_domain_model_profilecontent (
	title varchar(255) DEFAULT '' NOT NULL,
	description text NOT NULL,
);

#
# Table structure for table 'tx_schooldirectory_domain_model_careform'
#
CREATE TABLE tx_schooldirectory_domain_model_careform (
	title varchar(255) DEFAULT '' NOT NULL,
	description text NOT NULL,
);

#
# Table structure for table 'tx_schooldirectory_domain_model_schooldistrict'
#
CREATE TABLE tx_schooldirectory_domain_model_schooldistrict (
	title varchar(255) DEFAULT '' NOT NULL,
	streets int(11) unsigned DEFAULT '0' NOT NULL,
);

#
# Table structure for table 'tx_schooldirectory_domain_model_street'
#
CREATE TABLE tx_schooldirectory_domain_model_street (
	street varchar(255) DEFAULT '' NOT NULL,
	number_from int(11) DEFAULT '0' NOT NULL,
	letter_from varchar(5) DEFAULT '' NOT NULL,
	number_to int(11) DEFAULT '0' NOT NULL,
	letter_to varchar(5) DEFAULT '' NOT NULL,
	district int(11) unsigned DEFAULT '0',
);
#
# Table structure for table 'tx_schooldirectory_domain_model_district'
#
CREATE TABLE tx_schooldirectory_domain_model_district (
	district varchar(255) DEFAULT '' NOT NULL,
);

#
# Table structure for table 'tx_schooldirectory_school_type_mm'
#
CREATE TABLE tx_schooldirectory_school_type_mm (
	uid_local int(11) unsigned DEFAULT '0' NOT NULL,
	uid_foreign int(11) unsigned DEFAULT '0' NOT NULL,
	sorting int(11) unsigned DEFAULT '0' NOT NULL,
	sorting_foreign int(11) unsigned DEFAULT '0' NOT NULL,

	KEY uid_local (uid_local),
	KEY uid_foreign (uid_foreign)
);

#
# Table structure for table 'tx_schooldirectory_school_profilecontent_mm'
#
CREATE TABLE tx_schooldirectory_school_profilecontent_mm (
	uid_local int(11) unsigned DEFAULT '0' NOT NULL,
	uid_foreign int(11) unsigned DEFAULT '0' NOT NULL,
	sorting int(11) unsigned DEFAULT '0' NOT NULL,
	sorting_foreign int(11) unsigned DEFAULT '0' NOT NULL,

	KEY uid_local (uid_local),
	KEY uid_foreign (uid_foreign)
);

#
# Table structure for table 'tx_schooldirectory_school_careform_mm'
#
CREATE TABLE tx_schooldirectory_school_careform_mm (
	uid_local int(11) unsigned DEFAULT '0' NOT NULL,
	uid_foreign int(11) unsigned DEFAULT '0' NOT NULL,
	sorting int(11) unsigned DEFAULT '0' NOT NULL,
	sorting_foreign int(11) unsigned DEFAULT '0' NOT NULL,

	KEY uid_local (uid_local),
	KEY uid_foreign (uid_foreign)
);
