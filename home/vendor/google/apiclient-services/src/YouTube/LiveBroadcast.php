<?php
/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

namespace Google\Service\YouTube;

class LiveBroadcast extends \Google\Model
{
  /**
   * @var LiveBroadcastContentDetails
   */
  public $contentDetails;
  protected $contentDetailsType = LiveBroadcastContentDetails::class;
  protected $contentDetailsDataType = '';
  /**
   * @var string
   */
  public $etag;
  /**
   * @var string
   */
  public $id;
  /**
   * @var string
   */
  public $kind;
  /**
   * @var LiveBroadcastMonetizationDetails
   */
  public $monetizationDetails;
  protected $monetizationDetailsType = LiveBroadcastMonetizationDetails::class;
  protected $monetizationDetailsDataType = '';
  /**
   * @var LiveBroadcastSnippet
   */
  public $snippet;
  protected $snippetType = LiveBroadcastSnippet::class;
  protected $snippetDataType = '';
  /**
   * @var LiveBroadcastStatistics
   */
  public $statistics;
  protected $statisticsType = LiveBroadcastStatistics::class;
  protected $statisticsDataType = '';
  /**
   * @var LiveBroadcastStatus
   */
  public $status;
  protected $statusType = LiveBroadcastStatus::class;
  protected $statusDataType = '';

  /**
   * @param LiveBroadcastContentDetails
   */
  public function setContentDetails(LiveBroadcastContentDetails $contentDetails)
  {
    $this->contentDetails = $contentDetails;
  }
  /**
   * @return LiveBroadcastContentDetails
   */
  public function getContentDetails()
  {
    return $this->contentDetails;
  }
  /**
   * @param string
   */
  public function setEtag($etag)
  {
    $this->etag = $etag;
  }
  /**
   * @return string
   */
  public function getEtag()
  {
    return $this->etag;
  }
  /**
   * @param string
   */
  public function setId($id)
  {
    $this->id = $id;
  }
  /**
   * @return string
   */
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param string
   */
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  /**
   * @return string
   */
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param LiveBroadcastMonetizationDetails
   */
  public function setMonetizationDetails(LiveBroadcastMonetizationDetails $monetizationDetails)
  {
    $this->monetizationDetails = $monetizationDetails;
  }
  /**
   * @return LiveBroadcastMonetizationDetails
   */
  public function getMonetizationDetails()
  {
    return $this->monetizationDetails;
  }
  /**
   * @param LiveBroadcastSnippet
   */
  public function setSnippet(LiveBroadcastSnippet $snippet)
  {
    $this->snippet = $snippet;
  }
  /**
   * @return LiveBroadcastSnippet
   */
  public function getSnippet()
  {
    return $this->snippet;
  }
  /**
   * @param LiveBroadcastStatistics
   */
  public function setStatistics(LiveBroadcastStatistics $statistics)
  {
    $this->statistics = $statistics;
  }
  /**
   * @return LiveBroadcastStatistics
   */
  public function getStatistics()
  {
    return $this->statistics;
  }
  /**
   * @param LiveBroadcastStatus
   */
  public function setStatus(LiveBroadcastStatus $status)
  {
    $this->status = $status;
  }
  /**
   * @return LiveBroadcastStatus
   */
  public function getStatus()
  {
    return $this->status;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(LiveBroadcast::class, 'Google_Service_YouTube_LiveBroadcast');
