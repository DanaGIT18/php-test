<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Method;

use TgBotApi\BotApiBase\Method\Interfaces\RestrictMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Traits\ChatIdVariableTrait;
use TgBotApi\BotApiBase\Method\Traits\FillFromArrayTrait;
use TgBotApi\BotApiBase\Method\Traits\UserIdVariableTrait;

/**
 * Class RestrictChatMemberMethod.
 *
 * @see https://core.telegram.org/bots/api#restrictchatmember
 */
class RestrictChatMemberMethod implements RestrictMethodAliasInterface
{
    use FillFromArrayTrait;
    use ChatIdVariableTrait;
    use UserIdVariableTrait;

    /**
     * Optional. Date when the user will be unbanned, DateTimeInterface.
     * If user is banned for more than 366 days or less than 30 seconds
     * from the current time they are considered to be banned forever.
     *
     * @var \DateTimeInterface|null
     */
    public $untilDate;

    /**
     * Optional. Pass True, if the user can send text messages, contacts, locations and venues.
     *
     * @var bool|null
     */
    public $canSendMessages;

    /**
     * Optional. Pass True, if the user can send audios, documents, photos, videos, video notes and voice notes,
     * implies can_send_messages.
     *
     * @var bool|null
     */
    public $canSendMediaMessages;

    /**
     * Optional. Pass True, if the user can send animations, games, stickers and use inline bots,
     * implies can_send_media_messages.
     *
     * @var bool|null
     */
    public $canSendOtherMessages;

    /**
     * Optional. Pass True, if the user may add web page previews to their messages, implies can_send_media_messages.
     *
     * @var bool|null
     */
    public $canAddWebPagePreviews;

    /**
     * @param $chatId
     * @param int        $userId
     * @param array|null $data
     *
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     *
     * @return RestrictChatMemberMethod
     */
    public static function create($chatId, int $userId, array $data = null): RestrictChatMemberMethod
    {
        $instance = new static();
        $instance->chatId = $chatId;
        $instance->userId = $userId;
        if ($data) {
            $instance->fill($data);
        }

        return $instance;
    }
}
