<?
class FileManager
{
    public static function linkCSS($path): void
    {
        ?><link rel="stylesheet" href="<?=$path?>?<?=filemtime($path)?>"><?
    }
    public static function linkJS($path): void
    {
        ?><script src="<?=$path?>?<?=filemtime($path)?>"></script><?
    }
}
