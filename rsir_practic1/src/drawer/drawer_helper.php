<?php

class drawer_helper
{
    const SHAPE_MASK = 0b11000000;
    const COLOR_MASK = 0b00110000;
    const WIDTH_MASK = 0b00001100;
    const HEIGHT_MASK = 0b00000011;
    const CIRCLE = 0b00;
    const SQUARE = 0b01;
    const TRIANGLE = 0b10;
    const ELLIPSE = 0b11;
    const COLORS = [
        0b00 => 'yellow',
        0b01 => 'blue',
        0b10 => 'black',
        0b11 => 'red'
    ];
    private int $shape;
    private string $color;
    private int $width;
    private int $height;

    public function __construct(int $parameter)
    {
        $this->shape = ($parameter & self::SHAPE_MASK) >> 6;
        $color = ($parameter & self::COLOR_MASK) >> 4;
        $this->width = (($parameter & self::WIDTH_MASK) >> 2) * 60;
        $this->height = (($parameter & self::HEIGHT_MASK) >> 0) * 60;


        //Проверяем, что размеры не равны 0
        if ($this->height == 0b00 || $this->width == 0b00)
            echo 'Wrong encoding';
        else {
            $this->color = self::COLORS[$color];
            $this->draw();
        }
    }

    private function draw(): void
    {
        //Отрисовываем фигуру согласно значению в поле shape
        $quarter_width = $this->width / 4;
        $quarter_height = $this->height / 4;
        $figure = match ($this->shape) {
            self::CIRCLE => <<<END
                <circle 
                    cx="$quarter_width" cy="$quarter_width" r="$quarter_width" 
                    fill="$this->color"/>
            END,
            self::SQUARE => <<<END
                <rect width="$this->width" height="$this->height" 
                    fill="$this->color"/>
            END,
            self::TRIANGLE => <<<END
                <polygon points="$this->width,$this->height 0,0 0,$this->height" 
                    fill="$this->color"/>
            END,
            self::ELLIPSE => <<<END
                <ellipse 
                    cx="$quarter_width" cy="$quarter_height" rx="$quarter_width" ry="$quarter_height"
                    fill="$this->color"/>
            END,
            default => 'Фигур с такими параметрами не существует',
        };
        echo <<<END
        <svg width="$this->width" height="$this->height">
            $figure
        </svg>                
        END;
    }
}
