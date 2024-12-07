<!-- Control Panel Widget -->
<div id="widget" onclick="toggleWidget()">
    <div class="style-icon">⚙️</div>
    <div id="options">
    <button onclick="openBackgroundColorMenu(event)">Change Background</button>
    <button onclick="openTextStyleMenu(event)">Change Text Style</button>
    <button onclick="openResetStyleMenu(event)">Reset Styles</button>
    </div>
</div>

<!-- Hidden Menus -->
<div id="background-color-menu" class="style-menu hidden">
    <label for="color-picker">Select Background Color:</label>
    <input type="color" id="color-picker">
    <label for="section-selector-bg">Choose Section:</label>
    <select id="section-selector-bg"></select>
    <button onclick="applyBackgroundColor()">Apply</button>
</div>

<div id="text-style-menu" class="style-menu hidden">
    <label for="font-style">Select Font Style:</label>
    <select id="font-style">
    <option value="italic">Italic</option>
    <option value="bold">Bold</option>
    <option value="underline">Underline</option>
    <option value="none">None</option>
    </select>
    <label for="text-color">Select Text Color:</label>
    <input type="color" id="text-color">
    <label for="section-selector-text">Choose Section:</label>
    <select id="section-selector-text"></select>
    <button onclick="applyTextStyle()">Apply</button>
</div>
<div id="reset-style-menu" class="style-menu hidden">
    <label for="reset-section-selector">Select Section:</label>
    <select id="reset-section-selector"></select>
    <button onclick="resetStyles()">Reset</button>
</div>