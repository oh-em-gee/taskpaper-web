<?php

// App Structure
	define('ROOT_DIR', dirname(dirname(__FILE__)) . '/'); // Top-level directory.
	define('CONF_DIR', ROOT_DIR . 'cnf/'); // Config directory.
	//define('IMG_DIR', ROOT_DIR . 'img/'); // Image directory.
	define('INC_DIR', ROOT_DIR . 'inc/'); // Includes directory.

// Title
	define('TITLE', 'TaskPaper.web');

// Credits
	define('CREDITS', '<span class="credit">' .
					 '<a class="credit" href="http://taskpaper-web.googlecode.com" target="external" title="TaskPaper.web">' . 
					 'TaskPaper.web</a> reimagined by ' .
					 '<a class="credit" href="http://neurolithictech.com" target="external" title="NeurolithicTech">'.
					 'NeurolithicTech'.'</a>.'.'<br />'.
					 'Based on the original by '.
					 '<a class="credit" href="http://e26.co.uk/" target="external" title="Edd Sowden">Edd Sowden</a>.' .
					 '</span>');

// Date Format
	// The recommended date format for TaskPaper is YYYY-MM-DD, where
	// YYYY’s are for year, MM’s are for month, and DD’s are for day.
	define('DATE_FORMAT_STRING','Y-m-d');
					 
// Pre-defined Tags
	define('DONE_TAG', '@done');
	define('DUE_TAG', '@due');
	
// Actions
	// These actions (mostly ajax requests) are one the index.php script
	// can act upon. They are defined here so that they are centralized.
	// Each definition value should be unique.
	define('act_EDIT_FIELD','edit');
	define('act_EDIT_PLAINTEXT','plain');
	define('act_PROJECT_VIEW','proj');
	define('act_TOGGLE_DONE','toggle');
	define('act_GENERIC_AJAX','ajax');
	
// Line IDs
	// Every line (project title, task, or note) has an ID number in the form of:
	//  aX:Y  where 'a' is a letter denoting the line type and 'X' and 'Y' are
	// numbers denoting the project key and line key (in the hash) respectively.
	define('lineID_PROJECT', 'p');
	define('lineID_PROJECT_WIDGET', 'pw');
	define('lineID_TASK', 't');
	define('lineID_TASK_WIDGET', 'tw');
	define('lineID_NOTE', 'n');
	define('lineID_NOTE_WIDGET', 'nw');
	
	
// Regular Expressions
	// Oh the simple joy of regular expressions. All I can say is I'm glad I'm the one
	// who wrote them and not the one who has to read them! ;-)
	
	// ***** Warning *****
	// If you use these defines in preg or ereg (or other regex applications), be sure to
	// delimit them. That is, use this: '/'.RE_PROJ.'/', NOT RE_PROJ just bare.
	
	// A project is a line that isn't a task and ends with a colon (':'), or a colon (':\n') 
	// followed by a newline. Tags can exist after the colon, but if any non-tag text is 
	// present, then it won’t be recognized as a project.
	define('RE_PROJ', '^(.+:)(?:$| @)'); // Project line
	
	// A task is a line that begins with a hyphen followed by a space ('- ') which can 
	// optionally be preﬁxed (i.e indented) with tabs or spaces. A task can have zero or 
	// more tags anywhere on the line (not just trailing at the end).
	define('RE_TASK', '(^[\t ]*)(- )(.+$)'); // Task line
	
	// A tag has the form "@tag", i.e. it starts with an "at" character ("@"), followed by a 
	// run of non-whitespace characters. A tag can optionally have a value assigned to 
	// it. The value syntax immediately follows the tag word (no whitespace between) 
	// and is enclosed by parentheses: '(' and ')'. The value text inside can have 
	// whitespace, but no newlines. Here is an example of a tag with a value: 
	// @tag(tag's value)
	define('RE_TAG_NAME_PART','(@\S[^\( \n]+)'); // Tag: name @xxx portion of a tag.
	define('RE_TAG_VALUE_PART','(\(\S[^\(\n]*\))?'); // Tag: value (yyyy) portion of a tag.
	define('RE_TAG', RE_TAG_NAME_PART.RE_TAG_VALUE_PART); // Tag: @xxx or @xxx(yyyy).
	define('RE_ENDTAGS',' '.RE_TAG.'(?: (?:@.+)|(?:$))'); // All tags at the end of the line.
	define('RE_DONE_TAG',DONE_TAG.RE_TAG_VALUE_PART); // Tag: @done or @done(yyyy).

?>