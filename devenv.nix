{ pkgs, ... }: {
    languages.javascript.enable = true;
    # Uses by default the latest LTS
    languages.javascript.package = pkgs.nodejs_20;

    languages.php.enable = true;
    languages.php.version = "8.2";

    dotenv.disableHint = true;
}
