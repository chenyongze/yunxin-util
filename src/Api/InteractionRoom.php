<?php

/**
 * 互动直播
 */

namespace YunxinUtil\Api;


use GuzzleHttp\Exception\GuzzleException;
use YunxinUtil\Exception\YunXinArgException;
use YunxinUtil\Exception\YunXinBusinessException;
use YunxinUtil\Exception\YunXinInnerException;
use YunxinUtil\Exception\YunXinNetworkException;

class InteractionRoom extends Base
{

    /**
     * 创建音视频房间
     * 创建一个音视频房间，可以创建一个IM版音视频房间
     *type	int	是	0表示IM音视频
     * channelName	String	是	房间名称，应用内唯一
     * accid	String	否	IM音视频需要这个参数，表示房间创建者
     * webrtc	int	否	是否支持webrtc，0表示不支持，1表示支持
     * selfconfig	string	否	表示自定义字段
     * roomconfig	String	否	房间属性，目前支持配置房间推流相关信息，可以转成JSON格式
     * 
     * @param integer $type
     * @param [type] $channelName
     * @param string $accid
     * @param string $webrtc
     * @param string $selfconfig
     * @param string $roomconfig
     * @return void
     */
    public function create($type = 0, $channelName, $accid = '', $webrtc = '', $selfconfig = '', $roomconfig = '')
    {
        $res = $this->sendRequest('nrtc/createChannel.action', [
            'type' => $type,
            'channelName' => $channelName,
            'accid' => $accid,
            'webrtc' => $webrtc,
            'selfconfig' => $selfconfig,
            'roomconfig' => $roomconfig,
        ]);
        return $res;
    }

    /**
     * 增加一个房间推流任务
     * channelName	String	是	房间名称，应用内唯一
     * type	int	是	0表示IM音视频
     * task	String	是	房间推流JSON
     * 
     * @param [type] $channelName
     * @param [type] $type
     * @param [type] $task
     * @return void
     */
    public function addRtmpTask($channelName, $type, $task)
    {
        $res = $this->sendRequest('nrtc/addRtmpTask.action', [
            'type' => $type,
            'channelName' => $channelName,
            'task' => $task,
        ]);
        return $res;
    }

    /**
     * 删除一个房间推流任务
     * channelName	String	是	房间名称，应用内唯一
     * type	int	是	0表示IM音视频
     * taskId	String	是	房间推流id
     * @param [type] $channelName
     * @param [type] $type
     * @param [type] $taskId
     * @return void
     */
    public function removeRtmpTask($channelName, $type, $taskId)
    {
        $res = $this->sendRequest('nrtc/removeRtmpTask.action', [
            'type' => $type,
            'channelName' => $channelName,
            'taskId' => $taskId,
        ]);
        return $res;
    }

    /**
     * 查询单个房间推流任务
     * channelName	String	是	房间名称，应用内唯一
     * type	int	是	0表示IM音视频
     * taskId	String	是	房间推流id
     * @param [type] $channelName
     * @param [type] $type
     * @param [type] $taskId
     * @return void
     */
    public function getRtmpTask($channelName, $type, $taskId)
    {
        $res = $this->sendRequest('nrtc/getRtmpTask.action', [
            'type' => $type,
            'channelName' => $channelName,
            'taskId' => $taskId,
        ]);
        return $res;
    }

    /**
     * 查询房间推流任务列表
     * channelName	String	是	房间名称，应用内唯一
     * type	int	是	0表示IM音视频
     * @param [type] $channelName
     * @param [type] $type
     * @return void
     */
    public function getRtmpTaskList($channelName, $type)
    {
        $res = $this->sendRequest('nrtc/getRtmpTaskList.action', [
            'type' => $type,
            'channelName' => $channelName,
        ]);
        return $res;
    }

    /**
     * 更新房间推流任务
     *
     * channelName	String	是	房间名称，应用内唯一
     * type	int	是	0表示IM音视频
     * ope	int	是	1表示更新，2表示删除
     * opeJson	json	是	更新或者删除的字段内容
     * 
     * @param [type] $channelName
     * @param [type] $type
     * @param [type] $ope
     * @param [type] $opeJson
     * @return void
     */
    public function updateRtmpTask($channelName, $type, $ope, $opeJson)
    {
        $res = $this->sendRequest('nrtc/updateRtmpTask.action', [
            'type' => $type,
            'channelName' => $channelName,
            'ope' => $ope,
            'opeJson' => $opeJson,
        ]);
        return $res;
    }
}
