{
  description = "Add php to workspace so pint and whatnot work";

  # Flake inputs
  inputs = {
	nixpkgs.url = "github:nixos/nixpkgs/nixos-unstable";
  };

  # Flake outputs
  outputs = { self, nixpkgs }:
	let
		system = "x86_64-linux";
		pkgs = nixpkgs.legacyPackages.${system};
	in
	{
	  # Development environment output
	  devShells.x86_64-linux.default = pkgs.mkShell {
		  packages = with pkgs; [
			php82
			nodejs_20
		  ];
		  shellHook = ''export NODE_BIN="${pkgs.nodejs_20}/bin/node"'';
		};
	};
}
