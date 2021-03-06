<?php

use Terminus\Models\Collections\Upstreams;

/**
 * Show Pantheon upstream information
 */
class Upstreams_Command extends TerminusCommand {

  /**
  * Search for Pantheon upstream info
  *
  * ### OPTIONS
  *
  * [--category=<category>]
  * : general, publishing, commerce, etc
  *
  * [--type=<type>]
  * : Pantheon internal upstream type definition
  *
  * [--framework=<drupal|wordpress>]
  * : Filter based on framework
  *
  * @subcommand list
  * @alias all
  **/
  public function all($args = array(), $assoc_args = array()) {
    $upstreams  = new Upstreams();
    $upstreams_list = $upstreams->getFilteredMemberList(
      $assoc_args,
      'id',
      array('id', 'longname', 'category', 'type', 'framework')
    );
    $this->output()->outputRecordList(
      $upstreams_list,
      array('id' => 'ID', 'longname' => 'Name', 'category' => 'Category', 'type' => 'Type', 'framework' => 'Framework')
    );
    return $upstreams;
  }

}

Terminus::add_command('upstreams', 'Upstreams_Command');
