<?php

namespace spec\PlanB\Beautifier;

use PlanB\Beautifier\Enviroment;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class EnviromentSpec extends ObjectBehavior
{
    public function it_retrieve_a_console_enviroment_when_sapi_is_cli()
    {
        $this->beConstructedThrough('getFromSapi', ['cli']);

        $this->shouldBeLike(Enviroment::CONSOLE());
    }

    public function it_retrieve_a_console_enviroment_when_sapi_is_phpdbg()
    {
        $this->beConstructedThrough('getFromSapi', ['phpdbg']);

        $this->shouldBeLike(Enviroment::CONSOLE());
    }

    public function it_retrieve_a_html_enviroment_when_sapi_is_not_cli_or_phpdbg()
    {
        $this->beConstructedThrough('getFromSapi', ['other sapi']);

        $this->shouldBeLike(Enviroment::HTML());
    }
}
